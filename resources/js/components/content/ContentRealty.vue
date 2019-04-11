<template>
    <v-content>          
        <v-container class="container-realty-card-max-desk">
            <v-layout row align-center>
                <v-flex>                              
                    <h1 class="display-1 text-xs-center text-md-left mt-1 mb-2">
                        {{ JSON.parse(realty).name }}
                    </h1>                     
                </v-flex>               
            </v-layout> 
            <realty-card-max-desk 
                :realty="JSON.parse(realty)"
                :locale="locale"
            ></realty-card-max-desk>
        </v-container>  
        
        <realty-card-max-mob 
            :realty="JSON.parse(realty)"
            :locale="locale"
        ></realty-card-max-mob>       
        
        <v-container>    
            <v-layout row>
                <v-flex>                              
                    <div class="mb-5" :style="{ marginTop: marginTop }">
                        {{ JSON.parse(realty)[`description_${locale}`] }}
                    </div>
                </v-flex>               
            </v-layout> 
            <v-layout v-if="JSON.parse(this.feedbacks).length > 0" row>
                <v-flex>  
                    <h2>{{ trans('text.menu.feedbacks') }}</h2>
                    <hr class="mb-3">
                    <div v-for="feedback in JSON.parse(feedbacks)" 
                         class="feedback mb-5">
                        <h5 class="mb-2">{{ feedback.header }}</h5>
                        <p>{{ feedback.text }}</p>
                    </div>
                </v-flex>               
            </v-layout>         
        </v-container> 
        
        <v-layout v-html="JSON.parse(realty).map_html"></v-layout>
        
    </v-content>
</template>


<script>
    import RealtyCardMaxDesk from '../RealtyCardMaxDesk.vue'
    import RealtyCardMaxMob from '../RealtyCardMaxMob.vue'
    
    export default {
//        mounted() { console.log(JSON.parse(this.feedbacks).length) },   
        props: [
            'locale',
            'realty',
            'feedbacks'            
        ],
        components: { 
            RealtyCardMaxDesk,
            RealtyCardMaxMob
        },
        data () {
            return { 
                descriptionClass: {
                    marginTop: '-25px'
                }
            }
        },
        computed: {
            marginTop() {
                switch (this.$vuetify.breakpoint.name) {
                    case 'md': return '-25px'
                    case 'lg': return '-25px'
                    case 'xl': return '-25px'
                }
            }
        }  
    }
</script>


<style scoped>    
/*    .description {
        margin-top: -25px;
    }*/
</style>