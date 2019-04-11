<template>     
    <v-list-tile class="connect-mob grow">
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
    .connect-mob {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
    }

    .connect-mob .v-list__tile__title.tel-text {
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 28px;
    }

    .connect-mob .v-list__tile__avatar {
        min-width: 25px;
    }

    .connect-mob .v-list__tile__avatar .v-avatar {
        margin-right: 8px;
    }
</style>
