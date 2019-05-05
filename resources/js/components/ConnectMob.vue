<template>  
    <div class="connect-mob hidden-md-and-up">
        
        <!-- Телефоны -->
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
        
        <!-- Мессенджеры и соцсети (иконки) -->
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
            
            <!-- Кнопка "Обратный звонок" (mobile) -->
            <v-flex d-flex justify-end xs6 :style="">
                <v-spacer></v-spacer>    
                
                <!-- PopUp -->
                <v-dialog v-model="dialogCallbackMob" persistent fullscreen>
                    <template v-slot:activator="{ on }">
                        <v-btn small 
                               v-on="on"
                               color="primary" 
                               :style="{ margin: 0, fontSize: '12px', padding: 0 }">
                               Обратный звонок
                        </v-btn>
                    </template>
                    <v-card>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-icon 
                                @click="dialogCallbackMob = false" 
                                :style="{ padding: '10px' }" 
                                class="close-icon">
                                close
                            </v-icon>
                        </v-card-actions>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <form action="/thank-you" method="get" :style="{ width: '100%' }">
                                          <v-flex xs12>
                                            <v-text-field 
                                                label="Имя*"
                                                name="name"
                                                v-model="name"
                                                :error-messages="nameErrors"
                                                required
                                                @input="$v.name.$touch()"
                                                @blur="$v.name.$touch()"
                                                ></v-text-field>
                                        </v-flex>
                                        <v-flex xs12>
                                            <v-text-field 
                                                label="Телефон*" 
                                                name="phone"
                                                type="number" 
                                                required
                                                v-model="phone"
                                                :error-messages="phoneErrors"
                                                @input="$v.phone.$touch()"
                                                @blur="$v.phone.$touch()"
                                                ></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 class="mt-5">
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn type="submit" large flat class="btn-main">{{ trans('text.send') }}</v-btn>
                                            </v-card-actions>
                                        </v-flex>
                                    </form>
                                </v-layout>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-dialog>
            </v-flex>
        </v-layout>

    </div>
</template>


<script> 
    import { validationMixin } from 'vuelidate'
    import { required } from 'vuelidate/lib/validators'
    
    export default { 
        mixins: [validationMixin],
        validations: {
            name: { required },
            phone: { required }            
        },
        props: ['phoneMain'],    
        data: () => ({ 
            dialogCallbackMob: false,
            name: '',
            phone: ''
        }),
        computed: {
            nameErrors () {
                const errors = []
                if (!this.$v.name.$dirty) return errors
                !this.$v.name.required && errors.push('Name is required.')
                return errors
            },
            phoneErrors () {
                const errors = []
                if (!this.$v.phone.$dirty) return errors
                !this.$v.phone.required && errors.push('Phone is required.')
                return errors
            }
        },
        methods: {
            submit () {
              this.$v.$touch()
            }
        }
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
    
    .close-icon:hover {
        color: red;
    }
    
</style>
