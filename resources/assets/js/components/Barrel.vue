<template>
	<header class="header">
		<div class="header__logo">
			<img src="../../img/logo_header.png" alt="">
		</div>
		<div class="header__menu">
			<a v-for="item in header_data" class="header__menu_item" v-bind:href="'#'+item.to">
				{{item.name}}
			</a>
			<div class="header__menu_button red_button">
				Замовити талони
				<div class="button_triangle"></div>
			</div>
		</div>
	</header>
	<div class="title">
		<div class="title__logo">
			<img src="../../img/title_logo.png" alt="">
		</div>
		<div class="title__text">
			<span>Вас вітає торговий дом АЗС “BARREL” на якому ви можете замовити талони на пальне</span>
		</div>
		<div class="title__button red_button">
			Замовити
			<div class="button_triangle"></div>
		</div>
		<div class="title__mouse">
			<img src="../../img/mouse.svg" alt="">
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
			<div class="title__button red_button">
				Замовити
				<div class="button_triangle"></div>
			</div>
		</div>
		<div class="advantages__img">
			<img src="../../img/advantage_img.png" alt="">
		</div>
	</div>
	<div class="sales" id="sales">
		<div class="sales__title">
			<div class="sales__title_first_row advantages__content_title__first_row">
				<div class="point pl-7 pr-7">02</div>
				<span>Актуальні Акції</span>
			</div>
			<div class="sales__title_second_row">
				<span>мережі АЗС “BARREL”</span>
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
				<span>мережі АЗС “BARREL”</span>
			</div>
		</div>
		<div class="amounts__list">
			<div v-for="item in amounts" class="amounts__list_item">
				<div class="amounts__list_item__photo">
					<img :src="getImageUrl(item.photo)" alt="">
				</div>
				<div class="amounts__list_item__content">
					<div class="amounts__list_item__content_name">{{item.name}}</div>
					<div class="amounts__list_item__content_amount">{{item.amount}} ГРН</div>
					<div class="amounts__list_item__content_ticket"><span>ТАЛОН - {{item.amount_by_ticket}} ГРН</span></div>
					<div class="amounts__list_item__content_notation">На данному ціннику вказана ціна за 1 літр палива</div>
				</div>
			</div>
			<div class="amounts__list_item">
				cs
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	import '@splidejs/splide/dist/css/themes/splide-default.min.css';

	export default {
		 components: {
		 	Splide,
		 	SplideSlide,
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
	      	{photo: 'sale_1.png', title: 'Щасливі вихідні', description: 'Лови знижку вихідного дня, кожну суботу та неділю <br> -2 грн/л на бензин <br>-1 грн/л на ДП <br> -0,5 грн/л на газ <br> за адресами: вул. Верхня ЗЕ та вул. Чурбанова ЗЖ'},
	      	{photo: 'sale_2.png', title: 'Даруємо 10 літрів !', description: 'В компанії Barrel є гарна новина для Вас - ми розігруємо 10л палива <br> Для участі у акції переходь у наш Instagram'},
	      	{photo: 'sale_3.png', title: 'Даруємо 50 літрів !', description: 'В компанії Barrel є гарна новина для Вас - ми розігруємо 50л палива <br> Для участі у акції переходь у наш Instagram'},
	      ],
	      amounts: [
	      	{photo: 'amount_1.png', name: '95', amount: '42,99', amount_by_ticket: '46'},
	      	{photo: 'amount_2.png', name: '92', amount: '39,99', amount_by_ticket: '46'},
	      	{photo: 'amount_3.png', name: 'ГАЗ', amount: '27,99', amount_by_ticket: '46'},
	      	{photo: 'amount_4.png', name: 'ДТ', amount: '48,99', amount_by_ticket: '46'},
	      ],
	      addresses: null,
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
	      }    
	  	};
	  },
	  mounted(){
	  	document.title = 'АЗС "BARREL"';
	  },
	  methods:{
	  	getImageUrl(name){
	  	        return new URL(`../../img/${name}`, import.meta.url).href
	  	    }
	  },
	};
</script>