<template>
    <div>
        <!-- Десктоп версия -->
        <v-img             
            src="/images/main.jpg"
            id="main-img"
            class="hidden-sm-and-down"
            >
            <v-container fluid grid-list-xl fill-height>
                <v-layout row align-center class="pb-3">
                    <v-flex>
                        <h1 class="header-main-screen-desk text-xs-center">{{ headerMainScreen }}</h1>
                        <h4 class="subheader-main-screen-desk text-xs-center">Приобретение недвижимости и управление ей с минимальным участием инвестора</h4>
                        <h4 class="subheader-main-screen-desk text-xs-center pb-5">Получайте стабильный пассивный доход до 9% годовых в евро!</h4>
                        <v-layout row justify-center align-center class="pb-5">
                            <v-dialog v-model="dialog" persistent max-width="600px">
                                <template v-slot:activator="{ on }">
                                    <v-btn v-on="on" large class="btn-main">
                                        Получить персональное предложение
                                    </v-btn>
                                </template>
                                <v-card>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-icon 
                                            @click="dialog = false" 
                                            :style="{ padding: '10px' }" 
                                            class="close-icon">
                                                close
                                        </v-icon>
                                    </v-card-actions>
                                    <v-card-text>
                                        <v-container grid-list-md>                                            
                                            <v-layout wrap>                                                
                                                <v-flex xs12>
                                                    <v-text-field label="Имя*" required></v-text-field>
                                                </v-flex>
                                                <v-flex xs12>
                                                    <v-text-field label="Телефон*" type="number" required></v-text-field>
                                                </v-flex>
                                                <v-flex xs12>
                                                    <v-text-field label="Email" type="email"></v-text-field>
                                                </v-flex>
                                                <v-flex xs12>
                                                    <v-text-field label="Приблизительный бюджет, €" type="number"></v-text-field>
                                                </v-flex>
                                                <v-flex xs12 class="mt-5">
                                                    <v-card-actions>
                                                        <v-spacer></v-spacer>                                                      
                                                        <v-btn large flat @click="dialog = false" class="btn-main">{{ trans('text.send') }}</v-btn>
                                                    </v-card-actions>
                                                </v-flex>
                                            </v-layout>
                                        </v-container>
                                    </v-card-text>                                  
                                  </v-card>
                            </v-dialog>
                        </v-layout>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-img>
        
        <!-- Мобильная версия -->
        <v-img             
            src="/images/main.jpg"
            id="main-img-mob"
            class="hidden-md-and-up"
            >
            <v-container fluid grid-list-xl>
                <v-layout row align-center class="hidden-md-and-up">
                    <v-flex>
                        <connect-mob :phone-main="phoneMain"></connect-mob>
                        <h1 class="header-main-screen-mob text-xs-center mb-5">{{ headerMainScreen }}</h1>
                        <v-layout row justify-center align-center class="mb-5">
                            <v-dialog v-model="dialogMob" persistent max-width="600px">
                                <template v-slot:activator="{ on }">
                                    <v-btn v-on="on" large class="btn-main">
                                        Узнать больше
                                    </v-btn>
                                </template>
                                <v-card>
                                    <v-card-text>
                                        <v-container grid-list-md>
                                            <v-layout wrap>
                                                <v-flex xs12>
                                                    <v-text-field label="Имя*" required></v-text-field>
                                                </v-flex>
                                                <v-flex xs12>
                                                    <v-text-field label="Email"></v-text-field>
                                                </v-flex>
                                            </v-layout>
                                        </v-container>
                                        <small>*Обязательные поля</small>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="blue darken-1" flat @click="dialogMob = false">Close</v-btn>
                                        <v-btn color="blue darken-1" flat @click="dialogMob = false">Save</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-layout>
                        <h4 class="text-xs-center subheader-mob mb-3">Приобретение недвижимости и управление ей с минимальным участием инвестора</h4>
                        <h4 class="text-xs-center subheader-mob">Получайте стабильный пассивный доход до 9% годовых в евро!</h4>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-img>
    </div>
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
            dialog: false,
            dialogMob: false
        })
    }
</script>


<style scoped>
    .header-main-screen-desk {
        font-family: 'Open Sans Condensed', sans-serif; 
        font-size: 56px;
        font-weight: 500;
    }
    
    .subheader-main-screen-desk {
        font-size: 24px;
    }

    .btn-main.v-btn.v-btn--large {
        font-size: 20px;
        border-radius: 3px;
        background-color: rgb(51, 153, 51);
        color: rgb(255, 255, 255);
        border: medium none;
        letter-spacing: 1px;  
        text-transform: none;
        font-weight: 400;
    }  
 
    .header-main-screen-mob {
        font-size: 24px;
        font-weight: 500;
    }
    .subheader-mob {
        font-size: 14px;
    }
    
    .v-card__actions {
        padding: 0;
    }
    
    .close-icon:hover {
        color: red;
    }
</style>
