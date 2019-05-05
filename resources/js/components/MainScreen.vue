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
                    
                    <!-- Модальное окно (desktop) -->
                    <v-dialog v-model="dialogDesk" persistent max-width="600px">
                        <template v-slot:activator="{ on }">
                            <v-btn v-on="on" large class="btn-main">
                                Получить персональное предложение
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-icon 
                                    @click="dialogDesk = false" 
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
                                            <v-flex xs12>
                                                <v-text-field 
                                                    label="Email" 
                                                    name="email"
                                                    type="email"
                                                    v-model="email"
                                                    :error-messages="emailErrors"
                                                    @input="$v.email.$touch()"
                                                    @blur="$v.email.$touch()"
                                                    ></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-text-field name="budget" label="Приблизительный бюджет, €" type="number"></v-text-field>
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
                    
                    <!-- Модальное окно (mobile) -->
                    <v-dialog v-model="dialogMob" persistent fullscreen>
                        <template v-slot:activator="{ on }">
                            <v-btn v-on="on" large class="btn-main">
                                Узнать больше
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-icon 
                                    @click="dialogMob = false" 
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
                                            <v-flex xs12>
                                                <v-text-field 
                                                    label="Email" 
                                                    name="email"
                                                    type="email"
                                                    v-model="email"
                                                    :error-messages="emailErrors"
                                                    @input="$v.email.$touch()"
                                                    @blur="$v.email.$touch()"
                                                    ></v-text-field>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-text-field name="budget" label="Приблизительный бюджет, €" type="number"></v-text-field>
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
                </v-layout>
                <h4 class="text-xs-center subheader-mob mb-3">Приобретение недвижимости и управление ей с минимальным участием инвестора</h4>
                <h4 class="text-xs-center subheader-mob pb-5">Получайте стабильный пассивный доход до 9% годовых в евро!</h4>
            </v-flex>
        </v-layout>
    </v-container>
</v-img>        
        
</div>
</template>

<script>
    import ConnectMob from './ConnectMob.vue'; 
    import { validationMixin } from 'vuelidate'
    import { required, maxLength, email } from 'vuelidate/lib/validators'    
    
    export default {
        mixins: [validationMixin],
        validations: {
            name: { required },
            phone: { required },            
            email: { email }
        },
        mounted() { }, 
        props: ['headerMainScreen', 'phoneMain'],
        components: {
            ConnectMob
        },
        data: () => ({ 
            dialogDesk: false,
            dialogMob: false,
            name: '',
            phone: '',
            email: ''
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
            },
            emailErrors () {
                const errors = []
                if (!this.$v.email.$dirty) return errors
                !this.$v.email.email && errors.push('Must be valid e-mail')
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
