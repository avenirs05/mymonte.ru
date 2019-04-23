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
        
        <!--
        
        <v-container grid-list-xl column> 
            <v-layout column>
                <v-flex>
                    <h3 class="blue--text mb-2">КАКОЕ МОРЕ В ЧЕРНОГОРИИ?</h3>
                    <p>Адриатическое море с чистой (прозрачность воды до 60 м) и лазурной водой, но при этом не самое теплое. Вода очень соленая (содержание природной соли 40 %) и богата минералами. Пляжный сезон в Черногории начинается в начале мая, а заканчивается в середине октября</p>
                </v-flex>
                <v-flex>
                    <h3 class="blue--text mb-2">КАКИЕ ПЛЯЖИ В ЧЕРНОГОРИИ?</h3>
                    <p>В Черногории более 100 пляжей, преимущественно с мелкой и крупной галькой. Песчаные пляжи в Черногории встречаются не везде. Практически все они находятся в Будванской ривьере: Будва, Бечичи, Свети-Стеван (Близикуче), Рафаиловичи, Петровац, Булярица. Пляжи в районе Котора, Рисана, Доброты в основном представлены бетонными плитами. Вход на пляжи Черногории бесплатный. Комплект лежаков (два шезлонга и зонт) стоит от 7 € до 15 € в день. 30% территории любого пляжа общедоступны.</p>
                </v-flex>
            </v-layout>    
        </v-container>-->
    </v-content>
</template>


<script>  
    import MainScreen from '../MainScreen.vue';
    
    export default { 
        mounted() {
            console.log(JSON.parse(this.areas))
        },
        props: [
            'locale', 
            'headerMainScreen',
            'headerMainContent',
            'phoneMain',
            'headerAreas',
            'areas'
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