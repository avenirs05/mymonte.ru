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
                href="/" 
                flat
                @click="drawer = !drawer"                    
                >
                <v-icon>home</v-icon>
                <v-list-tile-content class="menu-item-mob">
                    <v-list-tile-title>{{ trans('text.menu.home') }}</v-list-tile-title>
                </v-list-tile-content>                 
            </v-list-tile>
            <v-list-tile 
                flat
                disabled                 
                >
                <v-icon>account_balance_wallet</v-icon>
                <v-list-tile-content class="menu-item-mob">
                    <v-list-tile-title>{{ trans('text.menu.objects.title') }}</v-list-tile-title>
                </v-list-tile-content> 
            </v-list-tile>
            <v-list-tile
                v-for="realty in realties"
                :key="realty.title"
                :href="realty.href" 
                flat
                @click="drawer = !drawer"                    
                >
                <v-list-tile-content :style="{ marginLeft: '70px' }">
                    <v-list-tile-title :style="{ fontSize: '14px' }">
                        {{ realty.title }}
                    </v-list-tile-title>
                </v-list-tile-content> 
            </v-list-tile>
            <v-list-tile 
                href="/" 
                flat
                @click="drawer = !drawer"                    
                >
                <v-icon>account_box</v-icon>
                <v-list-tile-content class="menu-item-mob">
                    <v-list-tile-title>{{ trans('text.menu.contact') }}</v-list-tile-title>
                </v-list-tile-content>                   
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
</template>


<script>
    export default {
        data: () => ({
                drawer: false,
                realties: [
                    { title: trans('text.menu.objects.less_than_100'), href: '/less-than-100' },
                    { title: trans('text.menu.objects.from_100_to_150'), href: '/from-100-to-150' },
                    { title: trans('text.menu.objects.more_than_150'), href: '/more-than-150' },
                ],
                toggle_exclusive: 2,
                active_class_name: 'v-btn--active yellow--text',
                items: [
                      {
                        action: 'restaurant',
                        title: 'Dining',
                        active: true,
                        items: [
                          { title: 'Breakfast & brunch' },
                          { title: 'New American' },
                          { title: 'Sushi' }
                        ]
                      },
                      {
                        action: 'school',
                        title: 'Education',
                        items: [
                          { title: 'List Item' }
                        ]
                      }
                  ]
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
    .menu-item-mob {
        margin-left: 15px;
    }
</style>
