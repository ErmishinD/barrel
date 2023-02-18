<template>
	<GDialog v-model="modal_show" :width="320">
		<div class="modal">
			<div class="modal__title">
				ДЛЯ ЗАМОВЛЕННЯ ТАЛОНІВ
			</div> 
			<div class="modal__content">
				Напиши нашому менеджеру слово “Талони” у telegram або intagram, або телефонуй за номером: <br> <span>(+380)96-511-13-33</span>
			</div>
			<div class="modal__buttons">
				<a v-for="item in modal_redirects" :href="item.redirectTo" class="modal__buttons_item amounts__list_item__order_button">
					{{item.name}}
				</a>
			</div>
		</div>
	    
	 </GDialog>
	<header class="header" v-if="!isMobile">
		<div class="header__logo">
			<img :src="getImageUrl('logo_header.png')" alt="">
		</div>
		<div class="header__menu">
			<a v-for="item in header_data" class="header__menu_item" v-bind:href="'#'+item.to">
				{{item.name}}
			</a>
			<div class="header__menu_button red_button" v-on:click="modal_show = true">
				Замовити талони
				<div class="button_triangle"></div>
			</div>
		</div>
	</header>
	<header v-else class="header_burger">
		<Slide>
	      <a v-for="item in header_data" class="header__menu_item header_burger__item" v-bind:href="'#'+item.to">
				{{item.name}}
		  </a>
		  <div class="header__menu_button red_button header_burger__button" v-on:click="modal_show = true">
				Замовити талони
				<div class="button_triangle"></div>
			</div>

		   <div class="header_burger__logo">
		   	<img :src="getImageUrl('logo_header.png')" alt="">
		   </div>
    	</Slide>
	</header>
	<div class="title">
		<div class="title__logo">
			<img :src="getImageUrl('title_logo.png')" alt="">
		</div>
		<div class="title__text">
			<span>Вас вітає торговий дім АЗК “BARREL” на якому ви можете замовити талони на пальне</span>
		</div>
		<div class="title__button red_button" v-on:click="modal_show = true">
			Замовити
			<div class="button_triangle"></div>
		</div>
		<div class="title__mouse">
			<img :src="getImageUrl('mouse.svg')" alt="">
		</div>
	</div>
	<div class="advantages">
		<div class="advantages__content">
			<div class="advantages__content_title">
				<div class="advantages__content_title__first_row">
					<div class="point pl-7">01</div>
					<span>Найнижча ціна</span>
				</div>
				<div class="advantages__content_title__second_row">
					<span>з талонами на паливо</span>
				</div>
			</div>
			<div class="advantages__content_list">
				<div v-for="advantage in advantages" class="advantages__content_list__item">
					- {{advantage}}
				</div>
			</div>
			<div class="title__button advantages__content_button red_button" v-on:click="modal_show = true">
				Замовити
				<div class="button_triangle"></div>
			</div>
		</div>
		<div class="advantages__img">
			<img id="advantage_img_front" :src="getImageUrl('advantage_img_front.png')" alt="">
			<img id="advantage_img_back" :src="getImageUrl('advantage_img_back.png')" alt="">
		</div>
	</div>
	<div class="sales" id="sales">
		<div class="sales__title">
			<div class="sales__title_first_row advantages__content_title__first_row">
				<div class="point pl-7 pr-7">02</div>
				<span>Актуальні Акції</span>
			</div>
			<div class="sales__title_second_row">
				<span>мережі АЗК “BARREL”</span>
			</div>
		</div>
		<div class="sales_carousel">
			<splide :options="options">
				<splide-slide v-for="sale in sales">
					<div class="sales_carousel__item">
						<div class="sales_carousel__item_photo">
							<img :src="getImageUrl(sale.photo)" alt="">
						</div>
						<div class="sales_carousel__item_content">
							<div class="sales_carousel__item_content__title">
								{{sale.title}}
							</div>
							<div class="sales_carousel__item_content__underline"></div>
							<div class="sales_carousel__item_content__description">
								<span v-html="sale.description"></span>
							</div>	
						</div>
					</div>
					
				</splide-slide>
			</splide>
		</div>
	</div>
	<div class="amounts" id="amounts">
		<div class="sales__title">
			<div class="sales__title_first_row advantages__content_title__first_row">
				<div class="point pl-7 pr-7">03</div>
				<span>Ціни на пальне та газ</span>
			</div>
			<div class="sales__title_second_row">
				<span>мережі АЗК “BARREL”</span>
			</div>
		</div>
		<div class="amounts__list">
			<div v-for="item in amounts" class="amounts__list_item">
				<div class="amounts__list_item__photo">
					<img :src="item.photo" alt="">
				</div>
				<div class="amounts__list_item__content">
					<div class="amounts__list_item__content_name">{{item.name}}</div>
					<div class="amounts__list_item__content_amount">{{item.amount}} ГРН</div>
					<div class="amounts__list_item__content_ticket"><span>ТАЛОН {{item.amount_by_ticket}} ГРН</span></div>
					<div class="amounts__list_item__content_notation">На данному ціннику вказана ціна за 1 літр палива</div>
				</div>
			</div>
			<div class="amounts__list_item ">
				<div class="amounts__list_item__order">
					<div class="amounts__list_item__order_title">
						<span>Замовляй талони</span>
						<div class="amounts__list_item__order_title__notation">
							та не переплачуй за пальне
						</div>
					</div>
					<div class="amounts__list_item__order_button" v-on:click="modal_show = true">
						<span>ЗАМОВИТИ</span>
					</div>
				</div>
			</div>
		</div>
		<div class="amounts__notation">
			*На сайті показані середні ціни в мережі АЗК BARREL в Запоріжжі, фактичні ціни залежать від регіону, де розташована АЗК.
		</div>
	</div>
	<div class="map" id="map" >
		<div style="width: 100%; height: auto; position: relative; overflow: hidden;" v-on:click="pointer_events = 'auto'" > <iframe
		src="https://www.google.com/maps/d/u/0/embed?mid=1POSrxLpIGCVGK02u_ODIQrPRz6xk7dI&ehbc=2E312F" width="100%" height="600" frameborder="0" 
		:style="'border:0;  position: sticky; margin-top: -67px; pointer-events: '+pointer_events+';'"> </iframe>
		</div>
	</div>
	<div class="filling_stations">
		<div class="filling_stations__title">
			СПИСОК АЗК «BARREL»
		</div>
		<div class="filling_stations__list">
			<div v-for="address in addresses" class="filling_stations__list_item">
				<div class="filling_stations__list_item__text">
					{{address}}
				</div>
				<div class="filling_stations__list_item__mark">
					<img :src="getImageUrl('mark.svg')" alt="">
				</div>
			</div>
		</div>
	</div>
	<footer class="footer" id="footer">
		<div class="footer__main">
			<div class="footer__main_item">
				<div class="footer__main_item__title">Copyright © 2023 BARREL</div>
				<div class="footer__main_item__content" id="footer__main_item__icons">
					<!-- <a href=""><img style="width: 20px;" :src="getImageUrl('inst_icon.svg')" alt=""></a> -->
					<!-- <a href=""><img style="width: 10.5px;" :src="getImageUrl('facebook_icon.svg')" alt=""></a> -->
				</div>
			</div>
			<div class="footer__main_item">
				<div class="footer__main_item__title">Контактна інформація:</div>
				<div class="footer__main_item__content">
					<a href="tel:+38(096)-511-13-33">+38 (096)-511-13-33</a>
				</div>
			</div>
			<div class="footer__main_item">
				<div class="footer__main_item__title">Для пропозицій:</div>
				<div class="footer__main_item__content">
					<a href="mailto:Barrelazs@gmail.com">Barrelazs@gmail.com</a>
				</div>
			</div>
		</div>
		<div class="footer__notation">
			ТД «BARREL» м. Запоріжжя, вул. Запорізька, буд 38, поверх 4, офіс 2
		</div>
	</footer>

</template>

<script type="text/javascript">
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	import '@splidejs/splide/dist/css/themes/splide-default.min.css';

	import { GDialog } from 'gitart-vue-dialog'
	import 'gitart-vue-dialog/dist/style.css'

	import { Slide } from 'vue3-burger-menu'

	export default {
		 components: {
		 	Splide,
		 	SplideSlide,
		 	GDialog,
		 	Slide,
	  },
	  data(){
	    return {
	      header_data: [
	      	{name: 'Акції', to: 'sales'}, 
	      	{name: 'Ціни', to: 'amounts'},
	      	{name: 'На карті', to: 'map'},
	      	{name: 'Контакти', to: 'footer'},
	      ],
	      sales: [
	      	{photo: 'sale_1.png', title: 'Щасливі вихідні', description: 'Лови знижку вихідного дня, кожну суботу та неділю <br> -2 грн/л на бензин <br>-1 грн/л на ДП <br> -0,5 грн/л на газ <br> за адресами: вул. Верхня ЗЕ та вул. Чубанова ЗЖ'},
	      	{photo: 'sale_2.png', title: 'Даруємо 10 літрів !', description: 'В компанії Barrel є гарна новина для Вас - ми розігруємо 10л палива'}, //  <br> Для участі у акції переходь у наш Instagram
	      	{photo: 'sale_3.png', title: 'Даруємо 50 літрів !', description: 'В компанії Barrel є гарна новина для Вас - ми розігруємо 50л палива'}, //  <br> Для участі у акції переходь у наш Instagram
	      ],
	      amounts: [],
	      addresses: ['АЗК 001 м. Запоріжжя, вул. Верхня ЗЕ', 'АЗК 002 м. Запоріжжя, вул. Чубанова ЗЖ', 'АЗК 003 м. Запоріжжя, вул. Ігоря Сікорського 482', 'АЗК 004 м. Запоріжжя, вул. Українська 52Д', 'АЗК 005 м. Запоріжжя, вул. Барикадна 58Г'],
	      advantages: ['перечисляємо', 'кілька', 'переваг', 'талонів'],
	      options: {
	      	rewind : true,
	      	type: 'loop',
	      	gap: '3em',
	      	fixedWidth: '305px',
	      	perMove: 1,
	      	pagination: false,
	      	classes: {
	      		arrows: 'splide__arrows arrows_for_slider',
	      		arrow : 'splide__arrow arrow_for_slider',
	      	}
	      },
	      pointer_events: 'none',   
	      modal_show: false,
	      modal_redirects: [
			{ name: 'Наш Telegram', redirectTo: 'https://t.me/Vlad7788'},
	    //    {name: 'Наш Instagram', redirectTo: ''},
	       {name: '(+380)96-511-13-33', redirectTo: 'tel:+38(096)-511-13-33'},
	      ],
	      isMobile: false,
	  	};
	  },
	  created(){
	  	window.addEventListener("resize", this.resizeWindow);
	  },
	  mounted(){
	  	document.title = 'АЗК "BARREL"';
	  	this.resizeWindow()

		this.axios.get('/api/petrol_items').then(response => {
			this.amounts = response.data.data
		})
	  },
	  methods:{
	  	getImageUrl(name){
	  	        return new URL(`../../img/${name}`, import.meta.url).href
	  	},
	  	resizeWindow(e){
	  		this.isMobile = window.screen.width < 900
	  	}
	  },
	};
</script>