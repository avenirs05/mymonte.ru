<template>     
    <v-list-tile class="connect-desk hidden-sm-and-down grow">
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
        <v-list-tile-content>
            <v-list-tile-title class="tel-text">{{ phoneMain }}</v-list-tile-title>
        </v-list-tile-content>
    </v-list-tile>
</template>


<script>
    export default {
        props: ['phoneMain'],
        data: () => ({  })
    }
</script>


<style scoped>
    .connect-desk {
        padding-left: 24px;
        margin-left: 25px;
    }
    
    .connect-desk .v-list__tile__title.tel-text {
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 24px;
    }

    .connect-desk .v-list__tile__avatar {
        min-width: 25px;
    }

    .connect-desk .v-list__tile__avatar .v-avatar {
        margin-right: 8px;
    }
</style>