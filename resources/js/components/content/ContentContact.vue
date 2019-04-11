<template>
    <v-content>          
        <v-container class="mb-2">
            <v-layout row wrap>  
                <v-flex>
                    <h1 class="display-1 mt-1 mb-4 text-xs-center">Контакты</h1>  
                </v-flex>
            </v-layout>
            <hr class="grey lighten-5 mb-4 hidden-sm-and-down">
            <div v-html="contact"></div>
        </v-container>
    </v-content>
</template>

<script>    
    export default {
        mounted () { },
        props: ['contact'],
        data: () => ({ })        
    }
</script>

<style>
    .contacts-wrapper {
        font-size: 18px;
    }
</style>