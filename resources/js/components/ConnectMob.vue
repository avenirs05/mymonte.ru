<template>  
    <div class="connect-mob hidden-md-and-up">
        <div>
            <i class="material-icons">phone</i>
            {{ phoneMain }}&nbsp;
            <small>Украина</small>
        </div>
        <div class="">
            <i class="material-icons">phone</i>
            {{ phoneMain }}&nbsp;
            <small>Черногория</small>
        </div> 
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
    
    .messangers .v-list__tile {
        padding: 0;
    }
    
    .messangers .v-list__tile__avatar {
        min-width: 25px;
    }

    .messangers .v-list__tile__avatar .v-avatar {
        margin-right: 8px;
    }
/*    .connect-mob {
        display: flex;
        justify-content: center;
    }*/

/*    .connect-mob .v-list__tile__title.tel-text {
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 28px;
    }*/

/*    .connect-mob .v-list__tile__avatar {
        min-width: 25px;
    }

    .connect-mob .v-list__tile__avatar .v-avatar {
        margin-right: 8px;
    }*/
</style>
