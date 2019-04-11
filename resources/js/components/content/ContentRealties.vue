<template>
    <v-content>          
        <v-container>
            <v-layout row align-center>
                <v-flex>                              
                    <h1 class="display-1 text-xs-center">{{ header }}</h1>                     
                </v-flex>
            </v-layout>
            <hr class="grey lighten-5 mt-4 hidden-sm-and-down">
        </v-container>   
   
        <v-container v-for="realty in realties" :key="realty.name" class="hidden-sm-and-down realties-desk-wrap">
            <v-layout row wrap class="mb-5">
                <v-flex xs4>
                    <v-card dark :href="`realty/${realty.id}`" hover class="text-xs-left">
                        <v-img
                            class="white--text"                            
                            :src="realty.images[0].path"  
                            aspect-ratio="1.5"
                            ></v-img>
                    </v-card>
                </v-flex>
                <v-flex xs4>
                    <v-card flat class="pl-3 card-mini-right-text-desk">
                        <a :href="`realty/${realty.id}`" id="headline-wrap-desk">
                            <h3 class="headline">{{ realty.name }}</h3>
                        </a>
                        <h4 class="pt-3 mb-4">{{ realty[`subname_${locale}`] }}</h4>
                        <ul>
                            <li>
                                <b>{{ trans('text.realty.square') }}:</b> 
                                {{ realty.square }} {{ trans('text.realty.meters') }}<sup><small>2</small></sup>
                            </li>
                            <li>
                                <b>{{ trans('text.realty.dist_sea') }}:</b> 
                                {{ realty.dist_sea }} {{ trans('text.realty.meters') }}
                            </li>
                            <li>
                                <b>{{ trans('text.realty.bedrooms') }}:</b> 
                                {{ realty.bedrooms }}
                            </li>
                            <li>
                                <b>{{ trans('text.realty.capacity') }}:</b> 
                                {{ realty.capacity }}
                            </li>
                        </ul>
                    </v-card>
                </v-flex>
                <v-flex d-flex xs4>
                    <v-layout column align-end justify-space-between fill-height>
                        <v-flex>
                            <v-img src="/images/booking-logo.jpg" height="50" width="50">
                                <span class="booking-mark">{{ getBookingMark(realty) }}</span>
                            </v-img>
                        </v-flex>
                        <v-flex d-flex>
                            <v-layout column align-end justify-space-between fill-height>
                                <span class="price-text-through-desk">{{ trans('text.from') }} € {{ realty.price_line_through }}</span>  
                                <span class="price-text-desk">€ {{ realty.price }}</span> 
                                <v-btn class="btn-more-desk"
                                       large
                                       :href="`realty/${realty.id}`"
                                       >{{ trans('text.btn_more') }}
                                </v-btn>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
            <hr class="grey lighten-5 mt-4">
        </v-container>
        
        <v-container 
            v-for="realty in realties" 
            :key="realty.id" 
            class="hidden-md-and-up bg-color-card-mini-mob realties-mob-wrap">
            <v-layout row wrap class="">
                <v-flex xs6>
                    <v-card dark :href="`realty/${realty.id}`" hover class="text-xs-left">
                        <v-img
                            class="white--text"                            
                            :src="realty.images[0].path"  
                            aspect-ratio="1.5"
                        ></v-img>
                    </v-card>
                </v-flex>
                <v-flex xs6>
                    <v-card flat class="pl-3 card-mini-right-text-mob">
                        <a :href="`realty/${realty.id}`" id="headline-wrap-mob">
                            <h4>{{ realty.name }}</h4>
                        </a>
                        <ul>
                            <li>
                                <b>{{ trans('text.realty.square') }}:</b> 
                                {{ realty.square }} {{ trans('text.realty.meters') }}<sup><small>2</small></sup>
                            </li>
                            <li>
                                <b>{{ trans('text.realty.dist_sea') }}:</b> 
                                {{ realty.dist_sea }} {{ trans('text.realty.meters') }}
                            </li>
                            <li>
                                <b>{{ trans('text.realty.bedrooms') }}:</b> 
                                {{ realty.bedrooms }}
                            </li>
                            <li>
                                <b>{{ trans('text.realty.capacity') }}:</b> 
                                {{ realty.capacity }} {{ trans('text.realty.persons') }}
                            </li>
                        </ul>
                    </v-card>
                </v-flex>
                <v-flex d-flex class="pt-1" xs-12>
                    <v-layout row wrap align-end>
                        <v-flex xs6>
                            <v-btn 
                                class="btn-more-mob"                                   
                                :href="`realty/${realty.id}`"
                                :style="{ marginBottom: 0 }"
                                >{{ trans('text.btn_more') }}
                            </v-btn>
                        </v-flex>
                        <v-flex xs6 text-xs-right>                                                        
                            <span class="price-text-through-mob">{{ trans('text.from') }} € {{ realty.price_line_through }}</span>&nbsp; &nbsp; 
                            <span class="price-text-mob">€ {{ realty.price }}</span>                           
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
        
        <v-container>
            <v-pagination
                v-model="page"
                :length="Math.ceil( total / perPage)"
                :style="{ marginLeft: '-10px' }"
            ></v-pagination>
        </v-container>
    </v-content>
</template>


<script> 
    export default {  
        mounted() {   
            this.getTypeOfRealty();            
            this.getHeader();
            this.realties = JSON.parse(this.realtiesJson).data;
            this.total = JSON.parse(this.realtiesJson).total;
        },  
        
        props: ['locale', 'realtiesJson'],        
       
        data: () => ({ 
            header: '',
            realties: [],
            total: 1, 
            page: 1,
            perPage: 2,
            typeOfRealty: '',
            realtyPage: ''
        }),
        
        watch: {
            page() {
                this.getRealties();
            }
        },
        
        methods: {
            getTypeOfRealty() {
                switch(window.location.pathname) {
                    case '/villas':
                        this.typeOfRealty = 'villa';                          
                        break;
                    case '/apartments':
                        this.typeOfRealty = 'apartment'; 
                        break;   
                }
            },
            getHeader() {
                switch(this.typeOfRealty) {
                    case 'villa':
                        this.header = trans('text.menu.villas');                        
                        break;
                    case 'apartment':
                        this.header = trans('text.menu.apartments')
                        break;   
                }
            },
            getRealties() {
                axios.get('/realties-data', { 
                            params: {
                                page: this.page,
                                type_of_realty: this.typeOfRealty,
                                per_page: this.perPage
                            }                             
                }).then(response => {
                       this.realties = response.data.data;
                       this.total = response.data.total;    
                })
            },
             
             /**
             * Если оценка 9.0 или 8.0, то по умолчанию js обрезает до 8 или 9
             * Эта функция проверяет после точки и если 0, то добавляет знак 
             * после точки
             * @returns {undefined}
             */
            getBookingMark (realty) {
                let mark = realty.booking_mark;                
                if (mark === 0) return this.bookingMark = 'n/a';
                
                mark = String(mark);                
                if (mark[2] === undefined) mark += '.0';                 
                
                return mark;
             }
        }
    }
</script>


<style scoped> 
/* Десктоп-версия*/
    .realties-desk-wrap #headline-wrap-desk {
        text-decoration: none;
    }
    .realties-desk-wrap #headline-wrap-desk:hover {
        color: rgb(51, 122, 183);
        text-decoration: underline;
    }
    .realties-desk-wrap .v-card {
        background-color: transparent;
        font-size: 18px;
    }
    .realties-desk-wrap .v-card.card-mini-right-text-desk {
        margin-top: -5px;
    }
    .realties-desk-wrap h4 {
        font-weight: normal;
    }
    .realties-desk-wrap .price-text-desk {
        font-size: 24px;
    }
    .realties-desk-wrap .price-text-through-desk {
        text-decoration: line-through;
        text-decoration-color: red;
        font-size: 24px;        
    }
    .realties-desk-wrap .btn-more-desk.v-btn.v-btn--large {
        margin-right: 0;  
        padding: 10px 20px;
        font-size: 20px;
        border-radius: 3px;
        background-color: rgb(51, 153, 51);
        color: rgb(255, 255, 255);
        border: medium none;
        width: 100%;
        letter-spacing: 1px;  
        text-transform: none;
        font-weight: 400;
    }
    .realties-desk-wrap .booking-mark {
        position: absolute;
        color: #fff;
        left: 13px;
        top: 11px;
        font-size: 18px;
        color: white;
    }
/* End Десктоп-версия*/    


/*Мобильная версия*/
    .realties-mob-wrap.container {
        border-top: 1px solid #CCCCCC;
    }
    .realties-mob-wrap .v-card.card-mini-right-text-mob {
        background-color: transparent;
        font-size: 16px;
        margin-top: -5px;
    }
    .realties-mob-wrap .card-mini-right-text-mob ul {
        list-style-type: none;
        padding-inline-start: 0;
    }
    .realties-mob-wrap.bg-color-card-mini-mob {
        /*        background: lavender;*/
        margin-bottom: 0px;
    }
    .realties-mob-wrap .price-text-through-mob {
        text-decoration: line-through;
        text-decoration-color: red;
        font-size: 18px;        
    }
    .realties-mob-wrap .price-text-mob {
        font-size: 18px;
        color: green;
    }
    .realties-mob-wrap .btn-more-mob.v-btn.theme--light {
        letter-spacing: 1px;  
        text-transform: none;
        color: rgb(255, 255, 255);
        background-color: rgb(51, 153, 51);
        margin-left: 0; 
        marfin-bottom: 0;
    }
/*End Мобильная версия*/
</style>