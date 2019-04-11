<template>     
    <v-navigation-drawer
        ref="leftDrawer"
        class="hidden-md-and-up"  
        v-model="drawer"
        clipped
        fixed  
        dark
        >
        <v-list dense>
            <v-list-tile 
                v-for="item in menu"
                :key="item.title"
                :href="item.href" 
                flat
                @click="drawer = !drawer"                    
                >
                <v-list-tile-content>
                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
</template>


<script>
    export default {
        data: () => ({
                drawer: false,
                menu: [
                    { title: trans('text.menu.home'), href: '/' },
                    { title: trans('text.menu.villas'), href: '/villas' },
                    { title: trans('text.menu.apartments'), href: '/apartments' },
                    { title: trans('text.menu.feedbacks'), href: '/feedbacks' },
                    { title: trans('text.menu.contact'), href: '/contact' }
                ],
                toggle_exclusive: 2,
                active_class_name: 'v-btn--active yellow--text'
            }),
        methods: {
            /**
             * Подсветка нужной кнопки меню              
             * @param {type} href
             * @returns {default.methods.active_class_name|String}
             */
            activeClass(href) {
                let location = window.location.pathname;

                if (href !== '/') {
                    if (location.match(href)) {
                        return this.active_class_name;
                    } else
                        return '';
                }

                if (location === '/') {
                    return this.active_class_name;
                }
            }
        }
    }
</script>


<style scoped>
    .v-list__tile__title {
        font-size: 18px;
    }
</style>
