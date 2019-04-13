<template>
    <v-content>    
        <div>
            <v-toolbar flat color="white">
                <v-toolbar-title>Объекты</v-toolbar-title>
                <v-spacer></v-spacer>
                
                <v-dialog v-model="dialog" fullscreen scrollable>
                    <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark class="mb-2" v-on="on">Добавить объект</v-btn>
                    </template>
                    <v-card>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12 class="mb-3"><span class="headline">{{ formTitle }}</span></v-flex>                                   
                                    <v-flex xs12><v-text-field v-model="editedItem.name" label="Название" name="name"></v-text-field></v-flex>
                                    <v-flex xs12><v-select v-model="editedItem.type" :items="enums.type" label="Тип" name="type"></v-select></v-flex>    
                                    <v-flex xs12><v-text-field v-model="editedItem.price" label="Цена" name="price"></v-text-field></v-flex>
                                    <v-flex xs12><v-select v-model="editedItem.visibility" :items="enums.visibility" label="Видимость" name="visibility"></v-select></v-flex>  
                                    <v-flex xs12><v-text-field v-model="editedItem.city" label="Город" name="city"></v-text-field></v-flex>                        
                               
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
                :items="realties"
                :total-items="total"
                :rows-per-page-items="rowsPerPageItems"
                :pagination.sync="pagination"
                class="elevation-1"
                >
                <template v-slot:items="props">
                    <td class="text-xs-left">{{ props.item.name }}</td>
                    <td class="text-xs-left">{{ props.item.type }}</td>
                    <td class="text-xs-left">{{ props.item.price }}</td>
                    <td class="text-xs-left">{{ props.item.visibility }}</td>
                    <td class="justify-center layout px-0">
                        <v-icon small class="mr-2" @click="editItem(props.item)">edit</v-icon>
                        <v-icon small @click="deleteItem(props.item)">delete</v-icon>
                    </td>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="load"></v-btn>
                </template>
            </v-data-table>
        </div>        
    </v-content>
</template>


<script>
    export default {
        mounted() {
            //this.load()
        },
        data: () => ({            
            headers: [
                {
                    text: 'Название',
                    value: 'name',
                    sortable: true
                },
                {
                    text: 'Тип',
                    value: 'type',
                    sortable: true
                },
                {
                    text: 'Цена, €',
                    value: 'price',
                    sortable: true
                },
                {
                    text: 'Видимость',
                    value: 'visibility',
                    sortable: true
                },
                {
                    text: '',
                    value: 'name',
                    sortable: false
                }
            ],
            dialog: false,
            loading: false,
            realties: [],
            editedIndex: -1,
            enums: {
                type: ['villa', 'apartment'],
                visibility: ['опубликовано', 'скрыто']
            },
            editedItem: {
                name: '',
                type: '',
                price: 0,
                visibility: '',
                city: ''
            },
            defaultItem: {
                name: '',
                type: '',
                price: 0,
                visibility: '',
                city: ''
            },            
            pagination: {
                rowsPerPage: 5,
            },
            total: 0,
            rowsPerPageItems: [5, 10, 20, 50, 100]
            
        }),

        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'Новый объект' : 'Редактировать объект'
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
            load() {
                this.loading = true;
                
                let params = {
                    page: this.pagination.page,
                    per_page: this.pagination.rowsPerPage,
                    sort_by: this.pagination.sortBy,
                    descending: this.pagination.descending
                }            
                
                axios.get(route("admin.realty.index"), { 
                            params: params                            
                }).then(response => {
                       this.realties = response.data.data;
                       this.total = response.data.total;    
                }).finally(() => {
                    this.loading = false;
                })
            },
            
            updateInDb() {
                let data = {
                    name: this.editedItem.name,
                }
                
                axios.put(route("admin.realty.update", { id: this.editedItem.id }), data)
                    .then(response => {
                        console.log(response) 
                })
            },

            editItem(item) {
                this.editedIndex = this.realties.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem(item) {
                const index = this.realties.indexOf(item)
                confirm('Вы уверены, что хотите удалить этот объект?') && this.realties.splice(index, 1)
            },

            close() {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save() {
                this.updateInDb()
                if (this.editedIndex > -1) {
                    Object.assign(this.realties[this.editedIndex], this.editedItem)
                } else {
                    this.realties.push(this.editedItem)
                }
                this.close()
                
                //console.log(this.editedItem)
            }
        }
    } 
</script>


<style scoped>
    .v-btn.theme--light {
        font-weight: bold;
        letter-spacing: 1px;
    }

</style>