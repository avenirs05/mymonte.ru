<template>
<v-content>
    <div style="padding-left: 24px;" class="mt-5">
        <h3 class="mb-4">Все языки</h3>        
        <!-- Заголовок на Главной -->
        <v-flex xs12>
            <v-text-field 
                label="Основной телефон" 
                v-model="editedAllLangs.phone_main"
            ></v-text-field>
        </v-flex>
        <v-btn 
            :style="{ marginLeft: 0 }"
            color="success" 
            @click="updateIfAllLang">
            Обновить
        </v-btn>
    </div>      
</v-content>
</template>


<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        mounted() {
            this.load()
        },
        data: () => ({
            empty: '',
            editor: ClassicEditor,
            editorConfig: {},            
            editedAllLangs: {
                phone_main: ''
            }
        }),
        computed: {

        },
        watch: {

        },
        methods: {             
            load() {
                axios.get(route("admin-parameters-index"))
                        .then(response => {   
                            this.editedAllLangs.phone_main = response.data.phone_main.value                                                 
                        }).finally(() => {
                            this.loading = false;
                })
            },
           
            updateIfAllLang() {
                axios.post(route("admin-parameters-update"), this.editedAllLangs)
                    .then(response => {
                        console.log(response)
                        this.editedAllLangs.phone_main = response.data.phone_main;
                        //alert('Данные обновлены')
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }            
        }

    }
</script>


<style scoped>
    .v-btn.theme--light {
        font-weight: bold;
        letter-spacing: 1px;
    }
    .del-img-icon {
        color: white;
        font-weight: bold;
        font-size: 18px;
        cursor: pointer;
    }
    .del-img-icon:hover {
        color: antiquewhite;
    }
    .img-gallery,
    .img-primary {
        text-align: right;
    }
</style>