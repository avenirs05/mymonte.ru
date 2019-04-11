<template>
    <v-content> 
        <v-container>
            <v-layout row wrap>  
                <v-flex>
                    <h1 class="display-1 mt-1 mb-3 text-xs-center">{{ trans('text.menu.feedbacks') }}</h1>  
                </v-flex>
            </v-layout>
            <hr class="grey lighten-5 mb-4 hidden-sm-and-down">
            <v-layout row>
                <v-flex class="mt-3">  
                    <div v-for="feedback in feedbacks" 
                         :key="feedback.id" 
                         class="feedback mb-5">
                        <h5 class="mb-2">
                            {{ feedback.header }},
                            <a class="realty-link" 
                               :href="`/realty/${feedback.realty.id}`"
                               >{{ feedback.realty.name }} {{ feedback.realty.type }}
                            </a>                            
                        </h5>  
                        <p>{{ feedback.text }}</p>
                    </div>
                </v-flex>               
            </v-layout> 
        </v-container>
        
        <v-container :style="{ marginTop: '-40px' }">
            <v-pagination
                v-model="page"
                :length="Math.ceil( total / perPage)"
                :style="{ marginLeft: '-10px', marginTop: '-50px' }"
            ></v-pagination>
        </v-container>
    </v-content>
</template>

<script>    
    export default {
        mounted () { 
            //console.log(this.feedbacksJson);
            this.feedbacks = JSON.parse(this.feedbacksJson).data;
            this.total = JSON.parse(this.feedbacksJson).total;
        },
        props: ['feedbacksJson'],
        data: () => ({ 
            feedbacks: [],
            total: 0,
            page: 1,
            perPage: 2            
        }),
        watch: {
            page() {
                this.getFeedbacks();
            }
        },
        methods: {
            getFeedbacks() {
                axios.get('/feedbacks-data', { 
                            params: {
                                page: this.page,
                                per_page: this.perPage
                            }                             
                }).then(response => {
                       this.feedbacks = response.data.data;
                       this.total = response.data.total;    
                })
            }
        }
    }
</script>

<style scoped>
    a.realty-link:hover {
        color: blue;
    }
</style>