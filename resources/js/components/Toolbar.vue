<template>
    <v-toolbar app fixed dark fixed clipped-left id="toolbar">
        
        <!-- Меню-гамбургер (mobile) -->
        <v-toolbar-side-icon class="hidden-md-and-up mr-3" @click.stop="changeDrawer"></v-toolbar-side-icon>
        
        <!-- Лого (текстом) -->
        <v-toolbar-title class="logo-desk hidden-sm-and-down">MyMonte</v-toolbar-title>
        <v-toolbar-title class="logo-mob hidden-md-and-up">MyMonte</v-toolbar-title>
        
        <!-- Телефоны (desktop) -->
        <connect-desk :phone-main="phoneMain"></connect-desk> 
        
        <!-- Мессенджеры и иконки соцсетей (desktop)-->
        <v-list-tile class="messangers hidden-sm-and-down">
            <v-list-tile-avatar size="25" color="grey darken-3">
                <v-img
                    class="elevation-6"
                    src="/images/telegram.png"
                    ></v-img>
            </v-list-tile-avatar>
            <v-list-tile-avatar size="25" color="grey darken-3">
                <v-img
                    class="elevation-6"
                    src="/images/whatsapp.svg"
                    ></v-img>
            </v-list-tile-avatar>
            <v-list-tile-avatar size="25" color="grey darken-3">
                <v-img
                    class="elevation-6"
                    src="/images/viber.png"
                    ></v-img>
            </v-list-tile-avatar>
            <v-list-tile-avatar size="25" color="grey darken-3">
                <v-img
                    class="elevation-6"
                    src="/images/facebook.png"
                    ></v-img>
            </v-list-tile-avatar>
            <v-list-tile-avatar size="25" color="grey darken-3">
                <v-img
                    class="elevation-6"
                    src="/images/instagram.png"
                    ></v-img>
            </v-list-tile-avatar>
        </v-list-tile>
        
        <!-- Кнопка "Обратный звонок" (десктоп) -->
        <v-btn class="hidden-md-and-down"
               small 
               outline 
               color="white"                
               :style="{ marginLeft: '1px' }">
               Обратный звонок
        </v-btn>
        
        <v-spacer></v-spacer>            
        
        <!-- Меню (десктоп) -->
        <v-toolbar-items :style="{ marginRight: '10px' }">
            <v-btn   
                class="hidden-sm-and-down btn-menu-desktop"    
                :class="activeClass('/')" 
                active-class="v-btn--active yellow--text"
                flat                                      
                href="/"                       
                >
                {{ trans('text.menu.home') }}
            </v-btn>            
            <v-menu dark offset-y left bottom class="language-menu" attach="#toolbar">
                <v-btn 
                    flat slot="activator" 
                    class="hidden-sm-and-down btn-menu-desktop"    
                    :class="activeClass('/objects')" 
                    flat
                    >
                    {{ trans('text.menu.objects.title') }}
                </v-btn>
                <v-list>
                    <v-list-tile
                        v-for="(realty, index) in realties"
                        :key="index"
                        :href="realty.href"
                        >
                        <v-list-tile-content>
                            <v-list-tile-title text-xs-right>{{ realty.title }}</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>            
            <v-btn   
                class="hidden-sm-and-down btn-menu-desktop"    
                :class="activeClass('/contact')" 
                active-class="v-btn--active yellow--text"
                flat                                      
                href="/contact"                       
                >
                {{ trans('text.menu.contact') }}
            </v-btn>           
        </v-toolbar-items>
        
        <!-- Выбор языка -->
        <v-toolbar-items>
            <lang :locale="locale"></lang>
        </v-toolbar-items>
        
    </v-toolbar>       
</template>


<script>
    import ConnectDesk from './ConnectDesk.vue';
    
    export default {   
        mounted () { 
            //console.log(window.location.pathname); 
        }, 
        components: {
            ConnectDesk
        },
        props: ['locale', 'phoneMain'],    
        data: () => ({
            drawer: false,
            realties: [ 
                { title: trans('text.menu.objects.less_than_100'), href: '/less-than-100' },
                { title: trans('text.menu.objects.from_100_to_150'), href: '/from-100-to-150' },
                { title: trans('text.menu.objects.more_than_150'), href: '/more-than-150' },
            ],
            toggle_exclusive: 2,
            active_class_name: 'v-btn--active yellow--text'
        }),
        methods: {
            /**
             * @param {type} href
             * @returns {default.methods.active_class_name|String}
             */
            activeClass(href) {
                let location = window.location.pathname;               

                if (href !== '/' && href !=='/contact') {
                    if (location.match('/less-than-100') ||
                        location.match('/from-100-to-150') ||
                        location.match('/more-than-150')) 
                    {
                        return this.active_class_name;
                    }  else return '';                   
                }  
                
                if (location === '/contact' && href !== '/') {
                    return this.active_class_name;
                }             
                
                if (location === '/' && href !== '/contact') {
                    return this.active_class_name;
                } 
                
                return '';
            },
            
            changeDrawer() {
                this.$parent.$children[0].drawer = true;
            }            
        },
        computed: {
            logoHeight () {
                switch (this.$vuetify.breakpoint.name) {
                    case 'xs': return '25'
                    case 'sm': return '25'
                    case 'md': return '41'
                    case 'lg': return '41'
                    case 'xl': return '41'
                }
            }
        }     
    }
</script>


<style scoped>
    .logo-desk {
        color: rgb(255, 235, 59);
        border: 2px dashed rgb(255, 235, 59);
        padding-left: 10px;
        padding-right: 10px;
    }
    
    .v-toolbar__title:not(:first-child).logo-desk {
        margin-left: 0;
    }
    
    .logo-mob {
        color: rgb(255, 235, 59);
    }

    .v-toolbar__title:not(:first-child).logo-mob {
        margin-left: 0;
    }
    
    .v-btn.btn-menu-desktop {
        text-transform: none;
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 24px;
    }
    
    .v-btn--icon.logo {
        width: auto;
        pointer-events: none;         
    }
    
    .v-toolbar__content .v-btn--icon {
        margin: 0px;
    }       

    .v-list__tile__title {
        text-align: right;
    }
    
    .messangers .v-list__tile__avatar {
        min-width: 25px;
    }

    .messangers .v-list__tile__avatar .v-avatar {
        margin-right: 8px;
    }
</style>

