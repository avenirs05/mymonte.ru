<?php

use Illuminate\Database\Seeder;

use App\Content;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create(
			[
				'lang' => 'ru', 
				'header_main_screen' => 'Аренда вилл и апартаментов в Черногории без посредников',	
				'header_main_content' => 'Отдых в Черногории в 2019 году. Часто задаваемые вопросы.',
				'phone_main' => '+382 68 089 888',
				
				'areas' => '
					<v-container grid-list-xl> 
						<h3 class="text-xs-center mt-2 mb-4 blue--text">КУРОРТЫ И ГОРОДА В ЧЕРНОГОРИИ: КУДА ЛУЧШЕ ПОЕХАТЬ?</h3>
						<v-layout v-bind="columnOrRow">
							<v-flex>                    
								<h4 class="mb-2">Будванская ривьера</h4>
								<div>
									<p>Открытое море. Лучшие пляжи в Черногории, преимущественно песчано-галечные. Главные курортные места: <i>Будва, Бечичи, Рафаиловичи, Свети Стефан (Близикуче), Петровац, Булярица.</i></p>
								</div>                       
							</v-flex>
							<v-flex>                    
								<h4 class="mb-2">Бока-Которский залив</h4>
								<div>
									<p><i>Котор, Пераст, Рисан.</i> Много старинных зданий, каменных улочек, древних церквей, памятников и достопримечательностей. Идеальное место для культурного отдыха. Пляжей почти нет. Купаться можно, ныряя с каменных плит на набережных, либо  использовать небольшие понтоны с лесенками в воду. Открытого моря нет.</p>
									<p><i>Герцег-Нови, Кумбор, Биела</i>. Спокойное, чистое и глубокое море. Пляжи - мелкая галька. Самый зеленый и живописный регион, который называют «ботаническим садом» Черногории. Тихий курорт для семейного и романтического отдыха.</p>
								</div>                       
							</v-flex>
							<v-flex>                    
								<h4 class="mb-2">Барская ривьера</h4>
								<div>
									<p><i>Бар</i> — это крупный деловой и промышленный центр с кварталами офисов и торговым портом. Русскоязычных туристов мало, цены ниже. Пляж в Баре галечный, купающихся немного. Туристы приезжают сюда в основном за покупками.</p>
									<p><i>Добры Воды, Шушань, Сутоморе</i> — много туристов (в основном сербы), мало туристической инфраструктуры и пляжей.</p>
									<p><i>Ульцинь</i> — мусульманско-албанский край Черногории. Пляж - <i>Велика Плажа</i> протяженностью 13 км. Самый ветреный регион. Идеальное место для  кайтсерфинга.</p>
								</div>                       
							</v-flex>
						</v-layout>
					</v-container>
				',	
				
				'questions' => '
					    <v-container grid-list-xl column> 
							<v-layout column>
								<v-flex>
									<h3 class="blue--text mb-2">КАКОЕ МОРЕ В ЧЕРНОГОРИИ?</h3>
									<p>Адриатическое море с чистой (прозрачность воды до 60 м) и лазурной водой, но при этом не самое теплое. Вода очень соленая (содержание природной соли 40 %) и богата минералами. Пляжный сезон в Черногории начинается в начале мая, а заканчивается в середине октября</p>
								</v-flex>
								<v-flex>
									<h3 class="blue--text mb-2">КАКИЕ ПЛЯЖИ В ЧЕРНОГОРИИ?</h3>
									<p>В Черногории более 100 пляжей, преимущественно с мелкой и крупной галькой. Песчаные пляжи в Черногории встречаются не везде. Практически все они находятся в Будванской ривьере: Будва, Бечичи, Свети-Стеван (Близикуче), Рафаиловичи, Петровац, Булярица. Пляжи в районе Котора, Рисана, Доброты в основном представлены бетонными плитами. Вход на пляжи Черногории бесплатный. Комплект лежаков (два шезлонга и зонт) стоит от 7 € до 15 € в день. 30% территории любого пляжа общедоступны.</p>
								</v-flex>
							</v-layout>    
						</v-container>
				',
				
				'products' => '
					<v-container>	
						<h3 class="text-xs-center blue--text mb-4">КАКИЕ ЦЕНЫ НА ПРОДУКТЫ В ЧЕРНОГОРИИ В 2019 ГОДУ?</h3>
						<v-layout row wrap class="table-products-layout">   
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Продукт</th>
										<th scope="col">Единица измерения</th>
										<th scope="col">Цена, €</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="3"><b>Овощи</b></td>
									</tr>
									<tr>
										<td>Картофель</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,45</td>
									</tr>
									<tr>
										<td>Помидоры</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,80</td>
									</tr>
									<tr>
										<td>Огурцы</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,60</td>
									</tr>
									<tr>
										<td>Перец</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 2,00</td>
									</tr>

									<tr>
										<td colspan="3"><b>Фрукты</b></td>
									</tr>
									<tr>
										<td>Клубника</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,00</td>
									</tr>
									<tr>
										<td>Черешня</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 4,50</td>
									</tr>
									<tr>
										<td>Яблоки</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,70</td>
									</tr>
									<tr>
										<td>Бананы</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 1,00</td>
									</tr>
									<tr>
										<td>Виноград</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,00</td>
									</tr>
									<tr>
										<td>Апельсины</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,80</td>
									</tr>

									<tr>
										<td colspan="3"><b>Мясо</b></td>
									</tr>
									<tr>
										<td>Свинина</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,50</td>
									</tr>
									<tr>
										<td>Говядина</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 6,50</td>
									</tr>
									<tr>
										<td>Курица</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 2,50</td>
									</tr>
									<tr>
										<td>Ветчина</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,70</td>
									</tr>
									<tr>
										<td>Пршут</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 12,00</td>
									</tr>

									<tr>
										<td colspan="3"><b>Молочные продукты</b></td>
									</tr>
									<tr>
										<td>Сыр</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 5,00</td>
									</tr>
									<tr>
										<td>Масло</td>
										<td nowrap>0,25 кг</td>
										<td nowrap>от 2,50</td>
									</tr>
									<tr>
										<td>Молоко</td>
										<td nowrap>1 л</td>
										<td nowrap>от 0,70</td>
									</tr>

									<tr>
										<td colspan="3"><b>Морепродукты</b></td>
									</tr>
									<tr>
										<td>Мидии</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 2,50</td>
									</tr>
									<tr>
										<td>Креветки</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 15,00</td>
									</tr>
									<tr>
										<td>Устрицы</td>
										<td nowrap>1 шт</td>
										<td nowrap>от 1,00</td>
									</tr>
									<tr>
										<td>Дорада/сибас</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 8,00</td>
									</tr>
									<tr>
										<td>Форель</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 5,00</td>
									</tr>                

									<tr>
										<td colspan="3"><b>Напитки</b></td>
									</tr>
									<tr>
										<td>Вода без газа</td>
										<td nowrap>1,5 л</td>
										<td nowrap>от 0,50</td>
									</tr>
									<tr>
										<td>Минеральная вода с газом</td>
										<td nowrap>1,5 л</td>
										<td nowrap>от 0,65</td>
									</tr>
									<tr>
										<td>Пиво баночное</td>
										<td nowrap>0,5 л</td>
										<td nowrap>от 0,60</td>
									</tr>
									<tr>
										<td>Вино местное Plantaze</td>
										<td nowrap>0,75 л</td>
										<td nowrap>от 3,00</td>
									</tr>
									<tr>
										<td>Вино местное Plantaze</td>
										<td nowrap>1 л</td>
										<td nowrap>от 12,00</td>
									</tr>                

									<tr>
										<td colspan="3"><b>Прочие продукты</b></td>
									</tr>
									<tr>
										<td>Хлеб</td>
										<td nowrap>1 шт</td>
										<td nowrap>от 0,6</td>
									</tr>
									<tr>
										<td>Макароны</td>
										<td nowrap>0,5 кг</td>
										<td nowrap>от 0,60</td>
									</tr>
									<tr>
										<td>Яйца</td>
										<td nowrap>10 шт</td>
										<td nowrap>от 1,3</td>
									</tr>
									<tr>
										<td>Чай в пакетиках</td>
										<td nowrap>20 шт</td>
										<td nowrap>от 0,80</td>
									</tr>
									<tr>
										<td>Кофе молотый</td>
										<td nowrap>0,5 кг</td>
										<td nowrap>от 4,00</td>
									</tr>
									<tr>
										<td>Сахар</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,40</td>
									</tr>
									<tr>
										<td>Сигареты</td>
										<td nowrap>1 пачка</td>
										<td nowrap>от 2,00</td>
									</tr>
								</tbody>
							</table>
						</v-layout>	
					</v-container>
				',
				
				'contact_page' => '
					<v-layout class="mt-2"> 
						<v-flex class="contacts-wrapper mt-4">
							<p><b>Адрес:</b> Budva 85310</p>
							<p><b>Тел.:</b> +382 68 089 888</p>
							<p><b>Viber:</b> +382 68 089 888</p>
							<p><b>WhatsApp:</b> +382 68 089 888</p>
							<p><b>E-mail:</b> arenda@mybudva.ru</p> 
						</v-flex>
					</v-layout>
				',
			]
		);	
		
		Content::create(
			[
				'lang' => 'en',
				'header_main_screen' => 'en_Аренда вилл и апартаментов в Черногории без посредников',
				'header_main_content' => 'en_Отдых в Черногории в 2019 году. Часто задаваемые вопросы.',
				'phone_main' => '+382 68 089 888',
				'areas' => '
					<v-container grid-list-xl> 
						<h3 class="text-xs-center mt-2 mb-4 blue--text">en_КУРОРТЫ И ГОРОДА В ЧЕРНОГОРИИ: КУДА ЛУЧШЕ ПОЕХАТЬ?</h3>
						<v-layout v-bind="columnOrRow">
							<v-flex>                    
								<h4 class="mb-2">en_Будванская ривьера</h4>
								<div>
									<p>Открытое море. Лучшие пляжи в Черногории, преимущественно песчано-галечные. Главные курортные места: <i>Будва, Бечичи, Рафаиловичи, Свети Стефан (Близикуче), Петровац, Булярица.</i></p>
								</div>                       
							</v-flex>
							<v-flex>                    
								<h4 class="mb-2">Бока-Которский залив</h4>
								<div>
									<p><i>Котор, Пераст, Рисан.</i> Много старинных зданий, каменных улочек, древних церквей, памятников и достопримечательностей. Идеальное место для культурного отдыха. Пляжей почти нет. Купаться можно, ныряя с каменных плит на набережных, либо  использовать небольшие понтоны с лесенками в воду. Открытого моря нет.</p>
									<p><i>Герцег-Нови, Кумбор, Биела</i>. Спокойное, чистое и глубокое море. Пляжи - мелкая галька. Самый зеленый и живописный регион, который называют «ботаническим садом» Черногории. Тихий курорт для семейного и романтического отдыха.</p>
								</div>                       
							</v-flex>
							<v-flex>                    
								<h4 class="mb-2">Барская ривьера</h4>
								<div>
									<p><i>Бар</i> — это крупный деловой и промышленный центр с кварталами офисов и торговым портом. Русскоязычных туристов мало, цены ниже. Пляж в Баре галечный, купающихся немного. Туристы приезжают сюда в основном за покупками.</p>
									<p><i>Добры Воды, Шушань, Сутоморе</i> — много туристов (в основном сербы), мало туристической инфраструктуры и пляжей.</p>
									<p><i>Ульцинь</i> — мусульманско-албанский край Черногории. Пляж - <i>Велика Плажа</i> протяженностью 13 км. Самый ветреный регион. Идеальное место для  кайтсерфинга.</p>
								</div>                       
							</v-flex>
						</v-layout>
					</v-container>
				',
				
				'products' => '
					<v-container>	
						<h3 class="text-xs-center blue--text mb-4">en_КАКИЕ ЦЕНЫ НА ПРОДУКТЫ В ЧЕРНОГОРИИ В 2019 ГОДУ?</h3>
						<v-layout row wrap class="table-products-layout">   
							<table class="table">
								<thead>
									<tr>
										<th scope="col">en_Продукт</th>
										<th scope="col">Единица измерения</th>
										<th scope="col">Цена, €</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="3"><b>Овощи</b></td>
									</tr>
									<tr>
										<td>Картофель</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,45</td>
									</tr>
									<tr>
										<td>Помидоры</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,80</td>
									</tr>
									<tr>
										<td>Огурцы</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,60</td>
									</tr>
									<tr>
										<td>Перец</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 2,00</td>
									</tr>

									<tr>
										<td colspan="3"><b>Фрукты</b></td>
									</tr>
									<tr>
										<td>Клубника</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,00</td>
									</tr>
									<tr>
										<td>Черешня</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 4,50</td>
									</tr>
									<tr>
										<td>Яблоки</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,70</td>
									</tr>
									<tr>
										<td>Бананы</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 1,00</td>
									</tr>
									<tr>
										<td>Виноград</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,00</td>
									</tr>
									<tr>
										<td>Апельсины</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,80</td>
									</tr>

									<tr>
										<td colspan="3"><b>Мясо</b></td>
									</tr>
									<tr>
										<td>Свинина</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,50</td>
									</tr>
									<tr>
										<td>Говядина</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 6,50</td>
									</tr>
									<tr>
										<td>Курица</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 2,50</td>
									</tr>
									<tr>
										<td>Ветчина</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 3,70</td>
									</tr>
									<tr>
										<td>Пршут</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 12,00</td>
									</tr>

									<tr>
										<td colspan="3"><b>Молочные продукты</b></td>
									</tr>
									<tr>
										<td>Сыр</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 5,00</td>
									</tr>
									<tr>
										<td>Масло</td>
										<td nowrap>0,25 кг</td>
										<td nowrap>от 2,50</td>
									</tr>
									<tr>
										<td>Молоко</td>
										<td nowrap>1 л</td>
										<td nowrap>от 0,70</td>
									</tr>

									<tr>
										<td colspan="3"><b>Морепродукты</b></td>
									</tr>
									<tr>
										<td>Мидии</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 2,50</td>
									</tr>
									<tr>
										<td>Креветки</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 15,00</td>
									</tr>
									<tr>
										<td>Устрицы</td>
										<td nowrap>1 шт</td>
										<td nowrap>от 1,00</td>
									</tr>
									<tr>
										<td>Дорада/сибас</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 8,00</td>
									</tr>
									<tr>
										<td>Форель</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 5,00</td>
									</tr>                

									<tr>
										<td colspan="3"><b>Напитки</b></td>
									</tr>
									<tr>
										<td>Вода без газа</td>
										<td nowrap>1,5 л</td>
										<td nowrap>от 0,50</td>
									</tr>
									<tr>
										<td>Минеральная вода с газом</td>
										<td nowrap>1,5 л</td>
										<td nowrap>от 0,65</td>
									</tr>
									<tr>
										<td>Пиво баночное</td>
										<td nowrap>0,5 л</td>
										<td nowrap>от 0,60</td>
									</tr>
									<tr>
										<td>Вино местное Plantaze</td>
										<td nowrap>0,75 л</td>
										<td nowrap>от 3,00</td>
									</tr>
									<tr>
										<td>Вино местное Plantaze</td>
										<td nowrap>1 л</td>
										<td nowrap>от 12,00</td>
									</tr>                

									<tr>
										<td colspan="3"><b>Прочие продукты</b></td>
									</tr>
									<tr>
										<td>Хлеб</td>
										<td nowrap>1 шт</td>
										<td nowrap>от 0,6</td>
									</tr>
									<tr>
										<td>Макароны</td>
										<td nowrap>0,5 кг</td>
										<td nowrap>от 0,60</td>
									</tr>
									<tr>
										<td>Яйца</td>
										<td nowrap>10 шт</td>
										<td nowrap>от 1,3</td>
									</tr>
									<tr>
										<td>Чай в пакетиках</td>
										<td nowrap>20 шт</td>
										<td nowrap>от 0,80</td>
									</tr>
									<tr>
										<td>Кофе молотый</td>
										<td nowrap>0,5 кг</td>
										<td nowrap>от 4,00</td>
									</tr>
									<tr>
										<td>Сахар</td>
										<td nowrap>1 кг</td>
										<td nowrap>от 0,40</td>
									</tr>
									<tr>
										<td>Сигареты</td>
										<td nowrap>1 пачка</td>
										<td nowrap>от 2,00</td>
									</tr>
								</tbody>
							</table>
						</v-layout>	
					</v-container>
				',
				
				'questions' => '
					<v-container grid-list-xl column> 
						<v-layout column>
							<v-flex>
								<h3 class="blue--text mb-2">en_КАКОЕ МОРЕ В ЧЕРНОГОРИИ?</h3>
								<p>en_Адриатическое море с чистой (прозрачность воды до 60 м) и лазурной водой, но при этом не самое теплое. Вода очень соленая (содержание природной соли 40 %) и богата минералами. Пляжный сезон в Черногории начинается в начале мая, а заканчивается в середине октября</p>
							</v-flex>
							<v-flex>
								<h3 class="blue--text mb-2">КАКИЕ ПЛЯЖИ В ЧЕРНОГОРИИ?</h3>
								<p>В Черногории более 100 пляжей, преимущественно с мелкой и крупной галькой. Песчаные пляжи в Черногории встречаются не везде. Практически все они находятся в Будванской ривьере: Будва, Бечичи, Свети-Стеван (Близикуче), Рафаиловичи, Петровац, Булярица. Пляжи в районе Котора, Рисана, Доброты в основном представлены бетонными плитами. Вход на пляжи Черногории бесплатный. Комплект лежаков (два шезлонга и зонт) стоит от 7 € до 15 € в день. 30% территории любого пляжа общедоступны.</p>
							</v-flex>
						</v-layout>    
					</v-container>
				',
					'contact_page' => '
					<v-layout class="mt-2"> 
						<v-flex class="contacts-wrapper mt-4">
							<p><b>en_Адрес:</b> Budva 85310</p>
							<p><b>Тел.:</b> +382 68 089 888</p>
							<p><b>Viber:</b> +382 68 089 888</p>
							<p><b>WhatsApp:</b> +382 68 089 888</p>
							<p><b>E-mail:</b> arenda@mybudva.ru</p> 
						</v-flex>
					</v-layout>
				',
			]
		);
	}
}
