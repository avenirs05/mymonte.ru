<template>     
    <v-img             
        src="/images/main.jpg"
        id="main-img"
        >
        <v-container fill-height fluid grid-list-xl> 
            <v-layout row align-center class="hidden-sm-and-down pb-3">
                <v-flex>                              
                    <h1 class="header-main-screen text-xs-center">{{ headerMainScreen }}</h1>                                
                    <h4 class="text-xs-center">Приобретение недвижимости и управление ей с минимальным участием инвестора</h4>     
                    <h4 class="text-xs-center pb-5">Получайте стабильный пассивный доход до 9% годовых в евро!</h4>     
                    <v-layout row justify-center align-center class="pb-5">
                        <v-dialog v-model="dialog" persistent max-width="600px">
                            <template v-slot:activator="{ on }">
                                <v-btn v-on="on" large class="btn-get-offer-desk">
                                    Получить персональное предложение
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="headline">User Profile</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container grid-list-md>
                                        <v-layout wrap>
                                            <v-flex xs12 sm6 md4>
                                                <v-text-field label="Legal first name*" required></v-text-field>
                                            </v-flex>
                                            <v-flex xs12 sm6 md4>
                                                <v-text-field label="Legal middle name" hint="example of helper text only on focus"></v-text-field>
                                            </v-flex>
                                            <v-flex xs12 sm6 md4>
                                                <v-text-field
                                                    label="Legal last name*"
                                                    hint="example of persistent helper text"
                                                    persistent-hint
                                                    required
                                                    ></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-text-field label="Email*" required></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-text-field label="Password*" type="password" required></v-text-field>
                                            </v-flex>
                                            <v-flex xs12 sm6>
                                                <v-select
                                                    :items="['0-17', '18-29', '30-54', '54+']"
                                                    label="Age*"
                                                    required
                                                    ></v-select>
                                            </v-flex>
                                            <v-flex xs12 sm6>
                                                <v-autocomplete
                                                    :items="['Skiing', 'Ice hockey', 'Soccer', 'Basketball', 'Hockey', 'Reading', 'Writing', 'Coding', 'Basejump']"
                                                    label="Interests"
                                                    multiple
                                                    ></v-autocomplete>
                                            </v-flex>
                                        </v-layout>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" flat @click="dialog = false">Close</v-btn>
                                    <v-btn color="blue darken-1" flat @click="dialog = false">Save</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-layout> 

<!--                    <v-layout row justify-center class="mt-5">
                        <v-flex>
                            <v-list-tile class="messangers hidden-sm-and-down grow">
                                <v-spacer></v-spacer>
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
                                        src="/images/whatsapp.svg"
                                        ></v-img>
                                </v-list-tile-avatar>
                                <v-list-tile-avatar size="25" color="grey darken-3">
                                    <v-img
                                        class="elevation-6"
                                        src="/images/viber.png"
                                        ></v-img>
                                </v-list-tile-avatar>
                                <v-spacer></v-spacer>
                            </v-list-tile>
                        </v-flex>
                    </v-layout>-->
                </v-flex>  
            </v-layout>           
            
            <!-- Мобильная версия -->
            <v-layout row align-center class="hidden-md-and-up">
                <v-flex>                                
                    <connect-mob :phone-main="phoneMain"></connect-mob>
                    <h1 class="display-1 text-xs-center pb-5">{{ headerMainScreen }}</h1>                                
                </v-flex>
            </v-layout>
           

        </v-container>
    </v-img>  
</template>

<script>
    import ConnectMob from './ConnectMob.vue'; 
    
    export default {
        mounted() { }, 
        props: ['headerMainScreen', 'phoneMain'],
        components: {
            ConnectMob
        },
        data: () => ({ 
            dialog: false
        })
    }
</script>


<style scoped>
    .header-main-screen {
        font-family: 'Open Sans Condensed', sans-serif; 
        font-size: 44px;
        font-weight: 500;
    }
    .btn-get-offer-desk.v-btn.v-btn--large {
        font-size: 20px;
        border-radius: 3px;
        background-color: rgb(51, 153, 51);
        color: rgb(255, 255, 255);
        border: medium none;
        letter-spacing: 1px;  
        text-transform: none;
        font-weight: 400;
    }    

    .messangers .v-list__tile__avatar {
        min-width: 25px;
    }

    .messangers .v-list__tile__avatar .v-avatar {
        margin-right: 8px;
    }
</style>
