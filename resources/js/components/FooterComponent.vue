<template>   
    <v-footer
        height="auto"
        color="grey darken-3"
        dark
        >
        <v-layout
            justify-center
            row
            wrap
            >
            <v-flex
                grey
                darken-3
                py-3
                text-xs-center
                white--text
                xs12
                >
                &copy; 2015 — <strong>MyBudva</strong>
            </v-flex>  
        </v-layout> 
        
    </v-footer>
</template>

<script>
    import ConnectMob from './ConnectMob.vue'; 
    
    export default {
        mounted() { }, 
        props: ['contact'],
        components: {
            ConnectMob
        },
        data: () => ({  })
    }
</script>


<style scoped>

</style>