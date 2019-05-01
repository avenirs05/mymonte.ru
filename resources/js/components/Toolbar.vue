<template>
    <v-toolbar app fixed dark fixed clipped-left id="toolbar">
        <v-toolbar-side-icon class="hidden-md-and-up mr-3" @click.stop="changeDrawer"></v-toolbar-side-icon>
        
        <v-toolbar-side-icon class="logo" href="/">
            <img src="/images/logo.png" :height="logoHeight">
        </v-toolbar-side-icon> 
        
        <connect-desk :phone-main="phoneMain"></connect-desk>
        
        <v-spacer></v-spacer>            

        <v-toolbar-items>
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
                    :class="activeClass('/villas')" 
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
            
            <lang :locale="locale"></lang>
        </v-toolbar-items>
        
    </v-toolbar>       
</template>


<script>
    import ConnectDesk from './ConnectDesk.vue';
    
    export default {   
        mounted () { }, 
        components: {
            ConnectDesk
        },
        props: ['locale', 'phoneMain'],    
        data: () => ({
            drawer: false,
            menu: [
                { title: trans('text.menu.home'), href: '/' },
                { title: trans('text.menu.villas'), href: '/villas' },
                { title: trans('text.menu.apartments'), href: '/apartments' },
                { title: trans('text.menu.contact'), href: '/contact' }
            ],
            realties: [ 
                { title: trans('text.menu.objects.less_than_100'), href: '/' },
                { title: trans('text.menu.objects.from_100_to_150'), href: '/' },
                { title: trans('text.menu.objects.more_than_150'), href: '/' },
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

                if (href !== '/') {
                    if (location.match(href)) {
                        return this.active_class_name;
                    } else return '';                   
                }  
                
                if (location === '/') {
                    return this.active_class_name;
                }
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
    
    .logo:hover {
        background-color: black;
    }    
    .v-list__tile__title {
        text-align: right;
    }
</style>

