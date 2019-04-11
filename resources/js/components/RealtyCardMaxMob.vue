<template>
    <v-card class="mb-3 hidden-md-and-up">
        <v-carousel hide-delimiters :height="carouselHeight" :cycle="cycle">
            <v-carousel-item
                v-for="(image,i) in realty.images"
                :key="i"
                :src="image.path"
            ></v-carousel-item>
        </v-carousel>

        <v-card-title primary-title>
            <ul class="props-in-max-card-mob">
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
            
            <v-container>
                <h3 class="subheading indigo--text font-weight-bold text-xs-center mt-2">
                    {{ trans('text.realty.price_per_day') }} <span class="caption red--text darken-4">({{ trans('text.realty.without_discounts') }})</span>
                </h3> 
            </v-container>    
            
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
        </v-card-title>
    </v-card>  
</template>


<script>
    export default {  
        mounted() { 
            this.getPrimaryImg() 
        },
        props: ['realty', 'locale'],
        data () {
           return {
               cycle: false,  
               primaryImgPath: '', 
            }
        },
        methods: { 
            getPrimaryImg() {
                let images = this.realty.images;                
                
                for (let i = 0; i < images.length; i++) {
                     if (images[i].type === 'primary') {
                         this.primaryImgPath = images[i].path;
                         break;
                     }
                }
            }
        },
        computed: {
            carouselHeight() {                            
                switch (this.$vuetify.breakpoint.name) {
                    case 'xs': return '250'
                    case 'sm': return '400'
                }
            }
        }
    }
</script>


<style scoped>
    .props-in-max-card-mob {
        list-style-type: none;
        padding-inline-start: 0;
        line-height: 2;
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
</style>

