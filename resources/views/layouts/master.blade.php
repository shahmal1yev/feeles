<!DOCTYPE html>
<html lang='az'>

	<head>

		<meta name='csrf-token' content='{{ csrf_token() }}' />
		<meta name='{{ config("cookie.basketToken") }}' content='{!! Cookie::get(config("cookie.basketToken")) !!}' />
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		<meta name='theme-color' content='#000' />

		<title>{{ env('APP_NAME') }} - @yield('title')</title>

		<!-- DOCUMENT ICON -->
		<link rel='shortcut icon' href='/assets/logo/logo-white.png' />

		<!-- BOOTSTRAP 5 BETA2 -->
		<link rel='stylesheet' type='text/css' href='/assets/libs/bootstrap-5.0.0-beta2/css/bootstrap.min.css' />

		<!-- LIGHTSLIDER 1.1.6 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css" integrity="sha512-yJHCxhu8pTR7P2UgXFrHvLMniOAL5ET1f5Cj+/dzl+JIlGTh5Cz+IeklcXzMavKvXP8vXqKMQyZjscjf3ZDfGA==" crossorigin="anonymous" />

		<!-- LIGHTGALLERY 1.10.0 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/css/lightgallery.min.css" integrity="sha512-gk6oCFFexhboh5r/6fov3zqTCA2plJ+uIoUx941tQSFg6TNYahuvh1esZVV0kkK+i5Kl74jPmNJTTaHAovWIhw==" crossorigin="anonymous" />

		<!-- FONTAWESOME 5.15.3 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

		<!-- SWIPER 6.4.15 -->
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

		<!-- FONTS -->
		<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet"> -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">


		<link rel='stylesheet' type='text/css' href='/assets/css/style.css' />

		<script type='text/javascript'>
			
		</script>

	</head>
	<body class='bg-light'>

		<div class='container-xxl p-0'>
			@include('layouts.template.header')

			@yield('content')
			
			@include('layouts.template.footer')
		</div>

		<script type='text/x-tmpl' id='productCard'>
			<div class='col-6 col-sm-6 col-md-4 col-lg-3 px-1 mb-4 p-0 m-0'>
				<div data-id='{%=o.id%}' class='product-card'>
					<a class='product-link' href='{%=o.url%}'>
						<header class='product-header'>
							<div class='product-info viewed-info'>
								<small class='product-info-content'>
									<span class='product-viewed-info'>
										<i class='far fa-eye'></i>
										{%=o.viewCount%}
									</span>
								</small>
							</div>
							<div class='product-info discount-info'>
								<small class='product-info-content'>
									ENDİRİM
								</small>
							</div>
							<div class='product-info addbookmark-button-container'>
								<div class='addToBookmark like-button'></div>
							</div>
							<div class='product-image-container'>
								<img class='product-image' src='{%=o.image%}' />
							</div>
						</header>
						<footer class='product-footer'>
							<h4 class='product-name'>
								{%=o.name%}
							</h4>
							<h5 class='product-price'>
								<span class='price'>{%=o.price%}</span>
							</h5>
						</footer>
					</a>
				</div>
			</div>
		</script>

		<!-- BOOTSTRAP 5 BETA2 -->
		<script type='text/javascript' src='/assets/libs/bootstrap-5.0.0-beta2/js/bootstrap.bundle.min.js'></script>

		<!-- JQUERY 3.6.0 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

		<!-- LIGHTSLIDER 1.1.6 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" integrity="sha512-Gfrxsz93rxFuB7KSYlln3wFqBaXUc1jtt3dGCp+2jTb563qYvnUBM/GP2ZUtRC27STN/zUamFtVFAIsRFoT6/w==" crossorigin="anonymous"></script>

		<!-- LIGHTGALLERY 1.10.0 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/js/lightgallery.min.js" integrity="sha512-gDBgGPXSeC2hx1W3S1CfSHbAValtLI8OArTGf0UVX7Fwb9Ak7HUE3LK9UEZxKGYVrIe0CJUVZDk9B2dIPwJ6VQ==" crossorigin="anonymous"></script>

		<!-- FONTAWESOME 5.15.3 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

		<!-- SWIPER 6.4.15 -->
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

		<!-- AOS  2.3.1 -->
		<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-JavaScript-Templates/3.19.0/js/tmpl.min.js" integrity="sha512-62X328c9VQQkWxrLMccNyRISbwvqQDjvF/HFuvHBMGtZJbNvTG30k1M2O+PYLyWUrcHFKIPvr2OkgmUmcaiccw==" crossorigin="anonymous"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>

		<script type='module' src='/assets/js/script.js'></script>
		<script type='text/javascript' src='/assets/js/additional.js'></script>
	</body>
</html>