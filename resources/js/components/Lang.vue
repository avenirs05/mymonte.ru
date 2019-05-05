<template>
    <v-menu dark offset-y left bottom class="language-menu" attach="#toolbar">
        <v-btn flat slot="activator" class="flag-btn" :style="{ minWidth: '40px' }">
            <v-img position="center right" contain height="24px" width="24px" :src="`/images/flags/${locale}.png`" ></v-img>
        </v-btn>

        <v-list>
            <v-list-tile
                    v-for="(item, index) in items"
                    :key="index"
                    :href="`/locale/${item.name}`"
            >
                <v-list-tile-avatar>
                    <v-img contain height="24px" :src="`/images/flags/${item.name}.png`"></v-img>
                </v-list-tile-avatar>
                <v-list-tile-content>
                    <v-list-tile-title>{{item.title}}</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-menu>
</template>


<script>
    export default {
        props: ['locale'],   
        data: () => {
            return {
                items: [
                    {
                        name: 'ru',
                        title: 'Русский'
                    },
                    {
                        name: 'en',
                        title: 'English'
                    }
                ]
            }
        }        
    }
</script>


<style scoped>
    .flag-btn::before {
        color: transparent;
        padding-right: 0;
    }
    .flag-btn:hover {
        color: transparent;
    }
    
    .flag-btn {
        padding-right: 0;
        outline: none;
    }    
</style>