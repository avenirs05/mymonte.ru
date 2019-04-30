<template>
    <v-content>    
        <main-screen
            :header-main-screen="headerMainScreen"  
            :phone-main="phoneMain"
        ></main-screen>
        
        <v-container>
            <h2 class="text-xs-center mt-2 font-weight-bold">{{ headerMainContent }}</h2>
        </v-container>
        
        <v-container grid-list-xl> 
            <h3 class="text-xs-center mt-2 mb-4 blue--text">{{ headerAreas }}</h3>
            <v-layout v-bind="columnOrRow">
                <v-flex v-for="(area, i) in JSON.parse(areas)" :key="i">                    
                    <h4 class="mb-2">{{ area.header }}</h4>
                    <div v-html="area.text"></div>                       
                </v-flex>
            </v-layout>
        </v-container>       
                
        <v-container grid-list-xl column> 
            <v-layout column>
                <v-flex v-html="questions"></v-flex>
            </v-layout>    
        </v-container>
    </v-content>
</template>


<script>  
    import MainScreen from '../MainScreen.vue';
    
    export default { 
        mounted() {
            //console.log(JSON.parse(this.areas))
        },
        props: [
            'locale', 
            'headerMainScreen',
            'headerMainContent',
            'phoneMain',
            'headerAreas',
            'areas',
            'questions'
        ],     
        components: {
            MainScreen
        },
        data: () => ({ }),  
        computed: {
            columnOrRow() {
                const binding = {}

                if (this.$vuetify.breakpoint.smAndDown) {
                    binding.column = true;
                }

                return binding;
            }
        }
    }
</script>


<style>
/* В файл app.js добавлена функция vh() */
    .v-content {
        font-size: 18px;
    }
    
    table {
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
        padding: 10px;
    }

    table th {
        padding: 10px;
        color: blue;
    }

</style>