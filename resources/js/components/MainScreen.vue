<template>     
    <v-img
        class="white--text"                
        src="/images/main.jpg"
        id="main-img"
        >
        <v-container fill-height fluid grid-list-xl> 
            <v-layout row align-center class="hidden-sm-and-down">
                <v-flex>                              
                    <h1 class="display-1 text-xs-center pb-5">{{ headerMainScreen }}</h1>                                
                </v-flex>
            </v-layout>
            <v-layout row align-center class="hidden-md-and-up">
                <v-flex>                                
                    <connect-mob :phone-main="phoneMain"></connect-mob>
                    <h1 class="display-1 text-xs-center pb-5">{{ headerMainScreen }}</h1>                                
                </v-flex>
            </v-layout>
        </v-container>
    </v-img>  
</template>

<script>
    import ConnectMob from './ConnectMob.vue'; 
    
    export default {
        mounted() { }, 
        props: ['headerMainScreen', 'phoneMain'],
        components: {
            ConnectMob
        },
        data: () => ({  })
    }
</script>


<style scoped>

</style>
