<template>
    <v-content>    
        <main-screen
            :header-main-screen="headerMainScreen"  
            :phone-main="phoneMain"
        ></main-screen>
        
        <v-container>
            <h2 class="text-xs-center mt-2 font-weight-bold">{{ headerMainContent }}</h2>
        </v-container>
        
<!--        <v-container grid-list-xl> 
            <h3 class="text-xs-center mt-2 mb-4 blue--text">КУРОРТЫ И ГОРОДА В ЧЕРНОГОРИИ: КУДА ЛУЧШЕ ПОЕХАТЬ?</h3>
            <v-layout v-bind="columnOrRow">
                <v-flex>                    
                    <h4 class="mb-2">Будванская ривьера</h4>
                    <div>
                        <p>Открытое море. Лучшие пляжи в Черногории, преимущественно песчано-галечные. Главные курортные места: <i>Будва, Бечичи, Рафаиловичи, Свети Стефан (Близикуче), Петровац, Булярица.</i></p>
                    </div>                       
                </v-flex>
                <v-flex>                    
                    <h4 class="mb-2">Бока-Которский залив</h4>
                    <div>
                        <p><i>Котор, Пераст, Рисан.</i> Много старинных зданий, каменных улочек, древних церквей, памятников и достопримечательностей. Идеальное место для культурного отдыха. Пляжей почти нет. Купаться можно, ныряя с каменных плит на набережных, либо  использовать небольшие понтоны с лесенками в воду. Открытого моря нет.</p>
                        <p><i>Герцег-Нови, Кумбор, Биела</i>. Спокойное, чистое и глубокое море. Пляжи - мелкая галька. Самый зеленый и живописный регион, который называют «ботаническим садом» Черногории. Тихий курорт для семейного и романтического отдыха.</p>
                    </div>                       
                </v-flex>
                <v-flex>                    
                    <h4 class="mb-2">Барская ривьера</h4>
                    <div>
                        <p><i>Бар</i> — это крупный деловой и промышленный центр с кварталами офисов и торговым портом. Русскоязычных туристов мало, цены ниже. Пляж в Баре галечный, купающихся немного. Туристы приезжают сюда в основном за покупками.</p>
                        <p><i>Добры Воды, Шушань, Сутоморе</i> — много туристов (в основном сербы), мало туристической инфраструктуры и пляжей.</p>
                        <p><i>Ульцинь</i> — мусульманско-албанский край Черногории. Пляж - <i>Велика Плажа</i> протяженностью 13 км. Самый ветреный регион. Идеальное место для  кайтсерфинга.</p>
                    </div>                       
                </v-flex>
            </v-layout>
        </v-container>
        
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