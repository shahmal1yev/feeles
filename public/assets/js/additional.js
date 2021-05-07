(function(){
	let mx = 0;

	$('.cavad').on({
		mousedown: function(e) {
			this.sx = this.scrollLeft;
			mx = e.pageX - this.offsetLeft;
		},
		mousemove: function(e) {
			var mx2 = e.pageX - this.offsetLeft;
			if(mx) this.scrollLeft = this.sx + mx - mx2;
		}
	});

	$(document).on("mouseup", function(){
		mx = 0;
	});
})();

(function(){

	$('#lightSlider').lightSlider({
		gallery: true,
		item: 2,
		loop:true,
		slideMargin: 0,
		thumbItem: 9,
		enableDrag: false,
		onSliderLoad: function(element) {
			element.lightGallery({
				selector: '#lightSlider .image-slide-item'
			});
		}
	});

})();

(function() {

	const productsSwiperOptions = {
		pagination: {
			el: '.swiper-custom-pagination',
			type: 'bullets',
			clickable: true
		},
		autoplay: {
			delay: 1500,
			disableOnInteraction: false,
		},
		// loop: true,
		slidesPerView: 4,
		spaceBetween: 10,
		breakpoints: {
			1200: {
				slidesPerView: 5
			},

			992: {
				slidesPerView: 4
			},

			768: {
				slidesPerView: 3
			},

			576: {
				slidesPerView: 2
			},

			0: {
				slidesPerView: 2
			}
		}
	};

	let feedbacksSwiper = new Swiper('.swiper-feedbacks-container', {
		pagination: {
			el: '.swiper-custom-pagination',
			type: 'bullets',
		},
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		slidesPerView: 4,
		spaceBetween: 10,
		breakpoints: {
			1200: {
				slidesPerView: 5,
			},

			992: {
				slidesPerView: 4
			},

			768: {
				slidesPerView: 3
			},

			576: {
				slidesPerView: 2
			},

			400: {
				slidesPerView: 2
			},

			0: {
				slidesPerView: 1
			}
		}
	});

	let bestSellerSwiper = new Swiper('.swiper-best-seller-container', productsSwiperOptions);
	let mostViewedSwiper = new Swiper('.swiper-most-viewed-container', productsSwiperOptions);

	let swipers = {
		'.swiper-best-seller-container': bestSellerSwiper,
		'.swiper-most-viewed-container': mostViewedSwiper,
		'.swiper-feedbacks-container': feedbacksSwiper
	}

	// Object.keys(swipers).forEach((classSelector) => {
	// 	$(classSelector)
	// 	.hover(
	// 		() => {
	// 			// swipers[classSelector].autoplay.stop();
	// 			console.log(swipers[classSelector]);
	// 		},
	// 		() => {
	// 			console.log(swipers[classSelector]);
	// 			// swipers[classSelector].autoplay.start();
	// 		}
	// 	);
	// });
	
})();