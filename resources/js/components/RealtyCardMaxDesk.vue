<template>
    <div>
        <v-layout row wrap class="mb-3 mt-4 hidden-sm-and-down">
            <v-flex xs5>                    
                <v-card dark hover class="text-xs-left" @click="openLg">
                    <v-img
                        class="realty-card-desk white--text"                            
                        :src="primaryImgPath"  
                        aspect-ratio="1.5"
                        >
                    </v-img>
                </v-card>
            </v-flex>
            <v-flex xs4>
                <v-card flat class="pl-3 card-mini-right-text-desk">
                    <ul>
                        <li>
                            <b>{{ trans('text.realty.square') }}:</b> 
                            {{ realty.square }} {{ trans('text.realty.meters') }}<sup><small>2</small></sup>
                        </li>
                        <li>
                            <b>{{ trans('text.realty.view') }}:</b> 
                            {{ realty[`view_${locale}`] }}
                        </li>
                        <li>
                            <b>{{ trans('text.realty.bedrooms') }}:</b> 
                            {{ realty.bedrooms }}
                        </li>
                        <li>
                            <b>{{ trans('text.realty.capacity') }}:</b> 
                            {{ realty.capacity }}
                        </li>
                        <li>
                            <b>{{ trans('text.realty.dist_sea') }}:</b> 
                            {{ realty.dist_sea }} {{ trans('text.realty.meters') }}
                        </li>
                        <li>
                            <b>{{ trans('text.realty.dist_tivat') }}:</b> 
                            {{ realty.dist_tivat }} {{ trans('text.realty.km') }}
                        </li>
                        <li>
                            <b>{{ trans('text.realty.dist_podg') }}:</b> 
                            {{ realty.dist_podg }} {{ trans('text.realty.km') }} 
                        </li>
                        <li>
                            <b>{{ trans('text.realty.transfer') }}:</b> 
                            {{ realty[`transfer_${locale}`] }}
                        </li>
                        <li>
                            <b>{{ trans('text.realty.internet') }}:</b> 
                            {{ realty[`internet_${locale}`] }}
                        </li>
                        <li>
                            <b>{{ trans('text.realty.parking') }}:</b> 
                            {{ realty[`parking_${locale}`] }}
                        </li>
                    </ul>
                </v-card>
            </v-flex>
            <v-flex xs3>
                <v-card flat class="pl-3">
                    <h2 class="subheading indigo--text font-weight-bold mb-3">
                        {{ trans('text.realty.price_per_day') }} <span class="caption red--text darken-4">({{ trans('text.realty.without_discounts') }})</span>
                    </h2> 
                    <table class="table">
                        <tr>
                            <th>{{ trans('text.may') }}</th>
                            <td>{{ realty.price_may }} €</td>
                        </tr>
                        <tr>
                            <th>{{ trans('text.jun') }}</th>
                            <td>{{ realty.price_jun }} €</td>
                        </tr>
                        <tr>
                            <th>{{ trans('text.jul') }}</th>
                            <td>{{ realty.price_jul }} €</td>
                        </tr>
                        <tr>
                            <th>{{ trans('text.aug') }}</th>
                            <td>{{ realty.price_aug }} €</td>
                        </tr>
                        <tr>
                            <th>{{ trans('text.sep') }}</th>
                            <td>{{ realty.price_sep }} €</td>
                        </tr>
                        <tr>
                            <th>{{ trans('text.oct-apr') }}</th>
                            <td>{{ realty[`price_oct_apr_${locale}`] }}</td>
                        </tr>
                    </table>
                </v-card>
            </v-flex>
        </v-layout>
        <v-layout row align-center class="hidden-sm-and-down">
            <v-flex>                              
                <div id="lightgallery" ref="lightgallery">
                    <a v-for="image in realty.images" :key="image.id" :href="image.path"><img :src="image.path" /></a>
                </div>
            </v-flex>               
        </v-layout> 
    </div>
</template>


<script>
    export default {   
        mounted() { 
            this.getPrimaryImg() 
        },    
        props: ['realty', 'locale'],    
        data: () => ({ 
            primaryImgPath: ''            
        }),
        methods: {
            /**
             * Т.к. основная картинка лежит вне lightgallery,
             * то нужно при ее нажатии инициировать клик внутри первого элемента в
             * lightgallery
             * @returns {undefined}
             */
            openLg() {
                $('#lightgallery a').first().trigger("click");
            },
            getPrimaryImg() {
                let images = this.realty.images;                
                
                for (let i = 0; i < images.length; i++) {
                     if (images[i].type === 'primary') {
                         this.primaryImgPath = images[i].path;
                         break;
                     }
                }
            }
        }
    }
</script>


<style scoped>
    #lightgallery img {
        width: 65px;
        height: 43px;
        margin-right: 2px;
        margin-top: -5px;
    }

    .v-card {
        background-color: transparent;
        font-size: 18px;
    }

    .table {
        font-size: 16px;
        width: 100%;
        max-width: 100%;
        border: 1px solid #ddd;
        border-collapse: collapse;
    }

    table tr {
        border: 1px solid #ddd;
        text-align: left;
    }

    table td {
        padding: 8px;
        border: 1px solid #ddd;
        color: green;
        font-weight: bold;
    }

    table th {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .price-in-max-card-desk {
        list-style-type: none;
        padding-inline-start: 0;
    }

    .description {
        font-size: 16px;
    }
    
</style>

