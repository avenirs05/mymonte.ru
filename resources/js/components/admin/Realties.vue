<template>
    <v-content>    
        <div>
            <v-toolbar flat color="white">
                <v-toolbar-title>Объекты</v-toolbar-title>
                <v-spacer></v-spacer>
                
                <!-- Модальное окно -->
                <v-dialog v-model="dialog" fullscreen scrollable>
                    <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark class="mb-2" v-on="on">Добавить объект</v-btn>
                    </template>
                    <v-card>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12 class="mb-3"><span class="headline">{{ formTitle }}</span></v-flex>  
                                    
                                    <!-- Название -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="Название"
                                            v-model="editedItem.name"                                             
                                            name="name">                                                
                                        </v-text-field>
                                    </v-flex>

                                    <!-- Subname (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>
                                        <v-text-field 
                                            :label="`Название подробнее — ${locale.text}`" 
                                            v-model="editedItem[`subname_${locale.code}`]"                                            
                                            :name="`subname_${locale.code}`">                                                
                                        </v-text-field>
                                    </v-flex>
                                    
                                    <!-- Видимость -->
                                    <v-flex xs12>
                                        <v-select 
                                            label="Видимость" 
                                            v-model="editedItem.visibility" 
                                            :items="enums.visibility"                                             
                                            name="visibility"
                                        ></v-select>
                                    </v-flex>                                
                                    
                                    <!-- Тип (общий) -->
                                    <v-flex xs12>
                                        <v-select 
                                            label="Тип"
                                            v-model="editedItem.type" 
                                            :items="enums.type"                                             
                                            name="type"
                                        ></v-select>
                                    </v-flex>    
                                    
                                    <!-- Тип (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-select 
                                            :label="`Тип — ${locale.text}`" 
                                            v-model="editedItem[`type_${locale.code}`]" 
                                            :items="enums[`type_${locale.code}`]"                                             
                                            :name="`type_${locale.code}`"
                                        ></v-select>                                          
                                    </v-flex>    
                                    
                                    <!-- Район (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-select 
                                            :label="`Район — ${locale.text}`" 
                                            v-model="editedItem[`area_${locale.code}`]" 
                                            :items="enums[`area_${locale.code}`]"                                             
                                            :name="`area_${locale.code}`"
                                         ></v-select>                                          
                                    </v-flex>  
                                    
                                    <!-- Город (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-select 
                                            :label="`Город — ${locale.text}`" 
                                            v-model="editedItem[`city_${locale.code}`]" 
                                            :items="enums[`city_${locale.code}`]"                                             
                                            :name="`city_${locale.code}`"
                                        ></v-select>                                          
                                    </v-flex>  
                                    
                                    <!-- Цена -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="Цена"
                                            v-model="editedItem.price" 
                                            type="number"  
                                            name="price"
                                        ></v-text-field>
                                    </v-flex>
                                    
                                    <!-- Цена перечеркнутая -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="Цена перечеркнутая"
                                            v-model="editedItem.price_line_through" 
                                            type="number"  
                                            name="price_line_through"
                                        ></v-text-field>
                                    </v-flex>
                                    
                                    <!-- Цена перечеркнутая -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="Оценка booking"
                                            v-model="editedItem.booking_mark" 
                                            type="number"  
                                            name="booking_mark"
                                        ></v-text-field>
                                    </v-flex>     
                                    
                                    <!-- Площадь -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="Площадь"
                                            v-model="editedItem.square" 
                                            type="number"  
                                            name="square"
                                        ></v-text-field>
                                    </v-flex> 
                                    
                                    <!-- Вид (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-select 
                                            :label="`Вид — ${locale.text}`" 
                                            v-model="editedItem[`view_${locale.code}`]" 
                                            :items="enums[`view_${locale.code}`]"                                             
                                            :name="`view_${locale.code}`"
                                        ></v-select>                                          
                                    </v-flex>  
                                    
                                    <!-- Вместимость -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="Вместимость, человек"
                                            v-model="editedItem.capacity" 
                                            type="number"  
                                            name="capacity"
                                        ></v-text-field>
                                    </v-flex> 
                                    
                                    <!-- До моря, м -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="До моря, м"
                                            v-model="editedItem.dist_sea" 
                                            type="number"  
                                            name="dist_sea"
                                        ></v-text-field>
                                    </v-flex> 
                                    
                                    <!-- До аэропорта Тиват, км -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="До аэропорта Тиват, км"
                                            v-model="editedItem.dist_tivat" 
                                            type="number"  
                                            name="dist_tivat"
                                        ></v-text-field>
                                    </v-flex> 
                                    
                                    <!-- До аэропорта Подгорица, км -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="До аэропорта Подгорица, км"
                                            v-model="editedItem.dist_podg" 
                                            type="number"  
                                            name="dist_podg"
                                        ></v-text-field>
                                    </v-flex> 
                                    
                                    <!-- Трансфер (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-select 
                                            :label="`Трансфер — ${locale.text}`" 
                                            v-model="editedItem[`transfer_${locale.code}`]" 
                                            :items="enums[`transfer_${locale.code}`]"                                             
                                            :name="`transfer_${locale.code}`"
                                        ></v-select>                                          
                                    </v-flex>  
                                    
                                    <!-- Интернет (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-select 
                                            :label="`Интернет — ${locale.text}`" 
                                            v-model="editedItem[`internet_${locale.code}`]" 
                                            :items="enums[`internet_${locale.code}`]"                                             
                                            :name="`internet_${locale.code}`"
                                        ></v-select>                                          
                                    </v-flex>  
                                    
                                    <!-- Паркинг (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-select 
                                            :label="`Паркинг — ${locale.text}`" 
                                            v-model="editedItem[`parking_${locale.code}`]" 
                                            :items="enums[`parking_${locale.code}`]"                                             
                                            :name="`parking_${locale.code}`"
                                        ></v-select>                                          
                                    </v-flex>  
                                    
                                    <!-- Цены по месяцам -->
                                    <v-flex xs12><v-text-field label="Цена — Январь" v-model="editedItem.price_jan" type="number" name="price_jan" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Февраль" v-model="editedItem.price_feb" type="number" name="price_feb" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Март" v-model="editedItem.price_mar" type="number" name="price_mar" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Апрель" v-model="editedItem.price_apr" type="number" name="price_apr" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Май" v-model="editedItem.price_may" type="number" name="price_may" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Июнь" v-model="editedItem.price_jun" type="number" name="price_jun" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Июль" v-model="editedItem.price_jul" type="number" name="price_jul" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Август" v-model="editedItem.price_aug" type="number" name="price_aug" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Сентябрь" v-model="editedItem.price_sep" type="number" name="price_sep" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Октябрь" v-model="editedItem.price_oct" type="number" name="price_oct" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Ноябрь" v-model="editedItem.price_nov" type="number" name="price_nov" ></v-text-field></v-flex>
                                    <v-flex xs12><v-text-field label="Цена — Декабрь" v-model="editedItem.price_dec" type="number" name="price_dec" ></v-text-field></v-flex>
                                                                        
                                    <!-- Скидка -->
                                    <v-flex xs12>
                                        <v-text-field 
                                            label="Скидка"
                                            v-model="editedItem.discount" 
                                            type="number"  
                                            name="discount"
                                        ></v-text-field>
                                    </v-flex> 
                                    
                                    <!-- Цена октябрь-апрель (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>                                        
                                        <v-text-field 
                                            :label="`Цена — Октябрь-Апрель — ${locale.text}`" 
                                            v-model="editedItem[`price_oct_apr_${locale.code}`]"                                            
                                            :name="`price_oct_apr_${locale.code}`">                                                
                                        </v-text-field>                                         
                                    </v-flex> 
                                    
                                    <!-- Описание (языки) -->
                                    <v-flex v-for="(locale,index) in locales" :key="locale.index" xs12>  
                                        <v-textarea                                            
                                            :label="`Описание — ${locale.text}`"                                            
                                            v-model="editedItem[`description_${locale.code}`]"
                                            :name="`description_${locale.code}`"
                                        ></v-textarea>                                          
                                    </v-flex>    
                                    
                                    <!-- Карта код -->
                                    <v-flex xs12>  
                                        <v-textarea                                            
                                            label="Карта код"                                            
                                            v-model="editedItem.map_html"
                                            name="map_html"
                                        ></v-textarea>                                          
                                    </v-flex>     
                                    
                                    <!-- Картинки при редактировании -->         
                                    <div v-if="isEditAction">
                                        <v-flex 
                                            v-for="(image, index) in primaryImages"
                                            :key="image.index"
                                            class="mb-3" 
                                            xs12 
                                            >                                         
                                            <div class="mb-1"><b>Основное изображение</b></div>
                                            <v-img :src="image.path" :width="350" class="img-primary">
                                                <i @click="delPrimaryImg(editedItem)" class="material-icons del-img-icon">close</i>
                                            </v-img>
                                        </v-flex>                                    
                                        <v-flex xs12>  
                                            <div class="mb-1"><b>Изображения галереи</b></div>
                                            <v-layout row wrap justify-left>
                                                <v-flex 
                                                    v-for="(image, index) in editedItem.images" 
                                                    :key="image.index"
                                                    :style="{ padding: '1px' }" 
                                                    shrink                                                     
                                                    >
                                                    <v-img :src="image.path" :width="100" class="img-gallery">
                                                        <i class="material-icons del-img-icon">close</i>
                                                    </v-img>                                                
                                                </v-flex>
                                            </v-layout>
                                        </v-flex> 
                                    </div>
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
                <template v-slot:no-data></template>
            </v-data-table>
            
        </div>        
    </v-content>
</template>


<script>
    export default {
        mounted() {
            
        },
        data: () => ({            
            headers: [
                { text: 'Название', value: 'name', sortable: true },
                { text: 'Тип', value: 'type', sortable: true },
                { text: 'Цена, €', value: 'price', sortable: true },
                { text: 'Видимость', value: 'visibility', sortable: true },
                { text: '', value: '', sortable: false }
            ],
            dialog: false,
            loading: false,            
            editedIndex: -1,
            editedItem: { },
            defaultItem: { },   
            
            realties: [],
            pagination: {
                rowsPerPage: 50,
            },
            total: 0,
            rowsPerPageItems: [50, 100],
            
            primaryImgPath: '',
            secondaryImgPath: '',            
            
            enums: {
                type: ['villa', 'apartment'],
                type_ru: ['вилла', 'апартамент'],
                type_en: ['villa', 'apartment'],
                visibility: ['опубликовано', 'скрыто'],
                view_ru: ['на море', 'на море и горы', 'на горы', 'на окрестности и горы'], 
                view_en: ['sea', 'sea and mountains', 'mountains', 'surroundings and mountains'],
                transfer_ru: ['платный', 'бесплатный'],
                transfer_en: ['paid', 'free'],
                internet_ru: ['wi-fi'],
                internet_en: ['wi-fi'],
                parking_ru: ['платный', 'платный (частный)', 'платный (общественный)'],
                parking_en: ['paid', 'paid (private)', 'paid (public)'],
                country_ru: ['Черногория'],
                country_en: ['Montenegro'],
                city_ru: ['Будва', 'Кумбор'],
                city_en: ['Budva', 'Kumbor'],
                area_ru: ['Будванская ривьера',	'Бока-Которский залив',	'Барская ривьера'],
                area_en: ['Budva Riviera', 'Boka Kotorska Bay',	'Bar Riviera']
            },
            locales: [
                { code: 'ru', text: 'Русский' },
                { code: 'en', text: 'English' }
            ]            
        }),

        computed: {
            formTitle() { 
                return this.editedIndex === -1 ? 'Новый объект' : 'Редактировать объект' 
            },
            isEditAction() {
                return this.editedIndex !== -1 ? true : false 
            },
            primaryImages() {
                return this.editedItem.images.filter(image => image.type === 'primary');
            }
        },

        watch: {
            dialog(val) {  val || this.close() },
            pagination() { this.load() }
        },

        methods: {
            delPrimaryImg(editedItem) {
                console.log(this.editedItem);
            },        
     
            load() {
                this.loading = true;                
                let params = {
                    page: this.pagination.page,
                    per_page: this.pagination.rowsPerPage,
                    sort_by: this.pagination.sortBy,
                    descending: this.pagination.descending
                }            
                
                axios.get(route("admin.realty.index"), { params: params })
                     .then(response => {
                           this.realties = response.data.data;
                           this.total = response.data.total; 
                           //console.log(this.realties)
                     }).finally(() => {
                           this.loading = false;
                     })
            },
            
            updateInDb() {             
                //console.log(this.editedItem);
                axios.put(route("admin.realty.update", { id: this.editedItem.id }), this.editedItem)
                      .then(response => {
                          Object.assign(this.realties[this.editedIndex], this.editedItem)                          
                          this.close()
                      })
                      .catch(function (error) { console.log(error); })
            },
            
            addRealtyInDb() {    
                let newRealty = this.editedItem;
                axios.post(route("admin.realty.store"), newRealty)
                    .then(response => {
                        this.editedItem.id = response.data.id
                        this.realties.push(this.editedItem) 
                        this.close()
                    })
                    .catch(error => { console.log(error) });
            },
            
            editItem(item) {
                
                this.editedIndex = this.realties.indexOf(item)
                this.editedItem = Object.assign({}, item)   
                
                this.getPrimaryImgPath(this.editedItem)
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
                 /**
                 * В зависимости от того, добавляем объект или обновляем,
                 * вызываем нужную функцию
                 */
                this.editedIndex > -1 ? this.updateInDb() : this.addRealtyInDb()  
            }
        },
        
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