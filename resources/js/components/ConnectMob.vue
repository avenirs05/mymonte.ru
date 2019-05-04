<template>  
    <div class="connect-mob hidden-md-and-up">
        <div>
            <i class="material-icons">phone</i>
            {{ phoneMain }}&nbsp;
            <small>Черногория</small>
        </div>
        <div class="">
            <i class="material-icons">phone</i>
            {{ phoneMain }}&nbsp;
            <small>Украина</small>
        </div> 
        <v-layout row>
            <v-flex xs6 :style="{ paddingTop: 0, paddingRight: 0 }">
                <v-list-tile class="messangers mb-5" :style="{ marginLeft: '-16px' }">
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
            </v-flex>
            <v-flex d-flex justify-end xs6 :style="">
                <v-spacer></v-spacer>    
                <v-btn small 
                       color="primary" 
                       :style="{ margin: 0, fontSize: '12px', padding: 0 }">
                       Обратный звонок
                </v-btn>
            </v-flex>
        </v-layout>

    </div>
</template>


<script> 
    export default { 
            
        props: ['phoneMain'],    
        data: () => ({  })
    }
</script>


<style scoped>
    .material-icons {
        font-size: 14px;
    }
    
    .messangers .v-list__tile.theme--light {
        padding: 0;
    }
    
    .messangers .v-list__tile__avatar {
        min-width: 25px;
        margin-right: 3px;
    }

    .messangers .v-list__tile__avatar .v-avatar {
        margin-right: 8px;
    }
    


/*    .messangers .v-list__tile.theme--light {
        height: 10px;
    }*/
</style>
