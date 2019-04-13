<template>
    <v-toolbar app fixed dark fixed id="toolbar">    
        <v-toolbar-side-icon>
            <i class="material-icons">settings</i>
        </v-toolbar-side-icon>      
        
        <v-toolbar-title class="white--text">Админпанель</v-toolbar-title>
        
        <v-spacer></v-spacer>            

        <v-toolbar-items>
            <v-btn                 
                class="btn-menu-desktop"
                flat
                to="/"
                >Объекты
            </v-btn> 
            <v-btn                 
                class="btn-menu-desktop"      
                flat
                to="/content-to-edit"                
                >Контент
            </v-btn>
        </v-toolbar-items>
        
    </v-toolbar>       
</template>


<script>  
    export default {   
        mounted () { }, 
        components: {

        },
        props: [],    
        data: () => ({
            active_class_name: 'v-btn--active yellow--text'
        }),
        methods: {

        }  
    }
</script>


<style scoped>
    .v-btn.btn-menu-desktop {
        text-transform: none;
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 24px;
    }    
    
    .v-toolbar__content .v-btn--icon {
        margin: 0px;
    } 
    
    .v-toolbar__title:not(:first-child) {
        margin-left: 10px;
    }
    
    .v-toolbar__items {
        //margin-right: 100px;
    }
 
</style>

