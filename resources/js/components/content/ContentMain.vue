<template>
    <v-content>    
        <main-screen
            :header-main-screen="headerMainScreen"  
            :phone-main="phoneMain"
        ></main-screen>
        
        <v-container>
            <h2 class="text-xs-center mt-2 font-weight-bold">{{ headerMainContent }}</h2>
        </v-container>
        
        <slot name="areas"></slot>     
        <slot name="questions"></slot> 
        <slot name="products"></slot>  
        
    </v-content>
</template>


<script>  
    import MainScreen from '../MainScreen.vue';
    
    export default { 
//        mounted() { console.log(this.phoneMain)},   
        props: [
            'locale', 
            'headerMainScreen',
            'headerMainContent',
            'headerAreas',
            'phoneMain'
        ],     
        components: {
            MainScreen
        },
        data: () => ({ }),  
    }
</script>


<style>
/* В файл app.js добавлена функция vh() */
    .v-content {
        font-size: 18px;
    }
    
    .table-products-layout .table {
        font-size: 16px;
        width: 100%;
        max-width: 100%;
        border: 1px solid #ddd;
        border-collapse: collapse;
    }

    .table-products-layout table tr {
        border: 1px solid #ddd;
        text-align: left;
    }

    .table-products-layout table td {
        padding: 10px;
    }

    .table-products-layout table th {
        background: white;
        padding: 10px;
        color: blue;
    }
</style>