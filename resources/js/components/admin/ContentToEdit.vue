<template>
<v-content>
<div>
    <v-toolbar flat color="white">
        <v-toolbar-title>Текстовый контент</v-toolbar-title>
        <v-spacer></v-spacer>
        
        <!-- Модальное окно -->
        <v-dialog v-model="dialog" fullscreen scrollable>
            <template v-slot:activator="{ on }">
                <v-btn color="primary" dark class="mb-2" v-on="on" @click="btnAddNewContentClicked">Добавить контент (язык)</v-btn>
            </template>
            
            <v-card>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12 class="mb-3"><span class="headline">{{ formTitle }}</span></v-flex>
                            
                            <!-- Язык -->
                            <v-flex xs12>
                                <v-select 
                                    label="Язык"
                                    v-model="editedItem.name" 
                                    :items="langList"                                         
                                    name="name"
                                ></v-select>
                            </v-flex>
                            
                            <!-- Заголовок на Главной -->
                            <v-flex xs12>
                                <v-text-field 
                                    label="Основной заголовок на Главной" 
                                    v-model="editedContent.headerMainScreen"
                                ></v-text-field>
                            </v-flex>
                            
                            <!-- Заголовок на Главной перед основным контентом -->
                            <v-flex xs12>
                                <v-text-field 
                                    label="Заголовок на Главной перед основным контентом" 
                                    v-model="editedContent.headerMainContent"
                                ></v-text-field>
                            </v-flex>
                            
                            <!-- Районы -->
                            <v-flex v-for="(area, i) in editedContent.areas" :key="i" xs12>
                                <v-text-field 
                                    label="Заголовок района на Главной" 
                                    v-model="area.header"
                                ></v-text-field>
                                <div class="mb-3">
                                    <ckeditor                                                 
                                        :editor="editor" 
                                        v-model="area.text" 
                                        :config="editorConfig"
                                    ></ckeditor>
                                </div>
                            </v-flex>
                            
                            <!-- FAQ -->
                            <v-flex class="mt-3">
                                <div class="mb-2"><b>FAQ на Главной</b></div>
                                <div class="mb-3">
                                    <ckeditor                                                 
                                        :editor="editor" 
                                        v-model="editedContent.questions" 
                                        :config="editorConfig"
                                    ></ckeditor>
                                </div>
                            </v-flex>
                            
                            
                            
                            
                        </v-layout>
                    </v-container>
                </v-card-text>
                
                <v-card-actions>
                    <v-container :style="{ padding: 0 }">
                        <v-layout justify-end row>
                            <v-flex xs4 class="text-xs-right" :style="{ paddingRight: '30px' }">
                                    <v-btn color="blue darken-1" flat @click="close">Отмена</v-btn>
                                <v-btn color="blue darken-1" flat @click="save" class="save-btn">Сохранить</v-btn>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-actions>
                
            </v-card>
        </v-dialog>
    </v-toolbar>

    <v-data-table
        :loading="loading"
        :headers="headers"
        :items="languages"
        :total-items="total"
        :rows-per-page-items="rowsPerPageItems"
        :pagination.sync="pagination"
        class="elevation-1"
        >
        <template v-slot:items="props">
            <td class="text-xs-left">{{ props.item.name }}</td>
            <td class="justify-center layout px-0">
            <v-icon small class="mr-2" @click="editItem(props.item)">edit</v-icon>
            <v-icon small @click="deleteItem(props.item)">delete</v-icon>
            </td>
        </template>
        <template v-slot:no-data></template>
    </v-data-table>
</div>
</v-content>
</template>


<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        mounted() {
        },
        data: () => ({
            empty: '',
            editor: ClassicEditor,
            editorConfig: {},
            headers: [
                { text: 'Язык', value: 'code', sortable: true },
                { text: '', value: '', sortable: false }
            ],
            dialog: false,
            loading: false,
            editedIndex: -1,
            editedItem: {},
            defaultItem: {},
            languages: [],
            pagination: {
                rowsPerPage: 50
            },
            total: 0,
            rowsPerPageItems: [50, 100],
            secondaryImages: [],
            editedContent: {
                headerMainScreen: '',
                headerMainContent: '',                    
                areas: [{header:'', text: ''}, {header:'', text: ''}, {header:'', text: ''}],
                questions: ''
            }                
        }),
        computed: {
            langList() {
                let langs = []
                this.languages.map(language => langs.push(language.name))
                return langs
            },           
                        
            formTitle() {
                return this.editedIndex === -1 ? 'Новый контент' : 'Редактировать контент'
            },
            isEditRealty() {
                return this.editedIndex !== -1 ? true : false
            },
            isNewRealty() {
                return this.editedIndex === -1 ? true : false
            }
        },
        watch: {
            dialog(val) {
                val || this.close()
            },
            pagination() {
                this.load()
            }
        },
        methods: {  
            getHeaderMainScreen() {  
                let headerMainScreen = null;
                this.editedItem.contents.map(content => {
                    if (content.type === 'header_main_screen') {
                        headerMainScreen = content.text
                    }
                })                
                this.editedContent.headerMainScreen = headerMainScreen
            },
            
            getHeaderMainContent() {  
                let headerMainContent = null;
                this.editedItem.contents.map(content => {
                    if (content.type === 'header_main_content') {
                        headerMainContent = content.text
                    }
                })                
                this.editedContent.headerMainContent = headerMainContent
            },
            
            getAreas() {
                let areas = []                                
                this.editedItem.contents.map(content => {
                    if (content.type === 'areas') {
                        areas.push({
                            name: content.name,
                            header:content.header,
                            text: content.text                            
                        })   
                    }
                }) 
                this.editedContent.areas = areas                
            },
            
            getQuestions() {  
                let questions = null;
                this.editedItem.contents.map(content => {
                    if (content.type === 'questions') {
                        questions = content.text
                    }
                })                
                this.editedContent.questions = questions
            },
            
            load() {
                this.loading = true;
                let params = {
                    page: this.pagination.page,
                    per_page: this.pagination.rowsPerPage,
                    sort_by: this.pagination.sortBy,
                    descending: this.pagination.descending
                }

                axios.get(route("admin-languages-index"), { params: params })
                        .then(response => {   
                            //console.log(response)                            
                            this.languages = response.data.data;
                            this.total = response.data.total;
                            
                        }).finally(() => {
                            this.loading = false;
                })
            },

            addRealtyInDb() {
                this.editedContent.headerMainScreen = '';

                let newRealty = this.editedItem
                this.preventNull(newRealty)               

                axios.post(route("admin-content-add"), formData)
                     .then(response => {
                         this.editedItem = Object.assign({}, response.data)
                         this.languages.push(this.editedItem)
                         this.formData = new FormData()
                         this.close()
                     })
                     .catch(error => {
                         console.log(error)
                     })
            },
            
            btnAddNewContentClicked() {
                this.editedContent.headerMainScreen = ''
                this.editedContent.headerMainContent = ''
                this.editedContent.areas = [{header:'', text: ''}, {header:'', text: ''}, {header:'', text: ''}]
                this.editedContent.questions = ''

            },

            updateLanguageInDb() {
                let editedLanguage = this.editedItem;
                
                // Формируем данные для ajax-запроса
                editedLanguage.contents.filter(content => {
                    if (content.name === 'budva_riviera') {                        
                        this.editedContent.areas.map(area => {
                            if (area.name === 'budva_riviera') {
                                content.text = area.text
                                content.header = area.header
                            }
                        });
                    }
                    if (content.name === 'bar_riviera') {                        
                        this.editedContent.areas.map(area => {
                            if (area.name === 'bar_riviera') {
                                content.text = area.text
                                content.header = area.header
                            }
                        });
                    }
                    if (content.name === 'boka_kotor_bay') {                        
                        this.editedContent.areas.map(area => {
                            if (area.name === 'boka_kotor_bay') {
                                content.text = area.text
                                content.header = area.header
                            }
                        });
                    }
                    if (content.name === 'header_main_screen') {   
                        content.text =  this.editedContent.headerMainScreen
                    }
                    if (content.name === 'header_main_content') {   
                        content.text =  this.editedContent.headerMainContent
                    }
                    if (content.name === 'questions') {   
                        content.text =  this.editedContent.questions
                    }
                })
                

                axios.post(route("admin-language-update"), editedLanguage)
                        .then(response => {
                            console.log(response)
                            this.editedItem = Object.assign(this.languages[this.editedIndex], response.data)
                            this.close()
                        })
                        .catch(function (error) {
                            console.log(error)
                        })
            },

            delRealtyInDb(contentId) {
                axios.delete(route("admin-content-delete", contentId))
                        .then(response => {
                            console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
            },

            editItem(item) {
                this.editedIndex = this.languages.indexOf(item)
                this.editedItem = Object.assign({}, item)
                //console.log(this.editedItem.contents[0].name)
                this.getAreas()
                this.getHeaderMainScreen()
                this.getHeaderMainContent()
                this.getQuestions()
                this.dialog = true
            },
            deleteItem(item) {
                const index = this.languages.indexOf(item)
                this.delRealtyInDb(item.id)
                confirm('Вы уверены, что хотите удалить этот объект?') && this.languages.splice(index, 1)
            },
            close() {
                this.dialog = false

                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 10)
            },
            save() {
                // В зависимости от того, добавляем объект или обновляем, вызываем нужную функцию
                this.editedIndex > -1 ? this.updateLanguageInDb() : this.addRealtyInDb()
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