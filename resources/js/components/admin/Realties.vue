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
                        <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                        </v-card-title>

                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12>
                                        <v-text-field v-model="editedItem.name" label="Название"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12>
                                        <v-text-field v-model="editedItem.type" label="Тип"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12>
                                        <v-text-field v-model="editedItem.price" label="Цена"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12>
                                        <v-text-field v-model="editedItem.visibility" label="Видимость"></v-text-field>
                                    </v-flex>                                    
                                </v-layout>
                            </v-container>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" flat @click="close">Отмена</v-btn>
                            <v-btn color="blue darken-1" flat @click="save">Сохранить</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
                
            </v-toolbar>
            <v-data-table
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
                    <v-icon
                        small
                        class="mr-2"
                        @click="editItem(props.item)"
                        >
                        edit
                    </v-icon>
                    <v-icon
                        small
                        @click="deleteItem(props.item)"
                        >
                        delete
                    </v-icon>
                    </td>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="getRealties">Reset</v-btn>
                </template>
            </v-data-table>
        </div>        
    </v-content>
</template>


<script>
    export default {
        mounted() {
            this.getRealties()
        },
        data: () => ({
            dialog: false,
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
            realties: [],
            editedIndex: -1,
            editedItem: {
                name: '',
                type: '',
                price: 0,
                visibility: ''
            },
            defaultItem: {
                name: '',
                type: '',
                price: 0,
                visibility: ''
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
                this.getRealties()
            }
        },

        methods: {
            getRealties() {
                axios.get(route("admin.realty.index"), { 
                            params: {
                                page: this.pagination.page,
                                per_page: this.pagination.rowsPerPage,
                                sort_by: this.pagination.sortBy,
                                descending: this.pagination.descending
                            }                             
                }).then(response => {
                       //console.log(response)
                       this.realties = response.data.data;
                       this.total = response.data.total;    
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
                if (this.editedIndex > -1) {
                    Object.assign(this.realties[this.editedIndex], this.editedItem)
                } else {
                    this.realties.push(this.editedItem)
                }
                this.close()
            }
        }
    } 
</script>


<style>

</style>