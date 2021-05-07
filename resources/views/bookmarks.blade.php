@extends('layouts.master')

@section('title', 'Seçilmişlər')

@section('content')

	<section class='bg-white py-4 p-0 m-0'>

		<div class='container-fluid'>
			
			@if (empty($products))
				@include('layouts.template.bookmark.empty')
			@else
				<h3 class='section-header'>{{ __('Seçilmişlər') }}</h3>

				<div class='px-1 p-0 mt-5 m-0'>
					<div class='row p-0 m-0'>
						
						@foreach($products as $product)
							<div class='col-6 col-sm-6 col-md-4 col-lg-3 px-1 mb-4 p-0 m-0'>
								<div data-id='{{ $product["id"] }}' class='product-card'>
									<a class='product-link' href='/products'>
										<header class='product-header'>
											<div class='product-info viewed-info'>
												<small class='product-info-content'>
													<span class='product-viewed-info'>
														<i class='far fa-eye'></i>{{ $product["viewCount"] }}
													</span>
												</small>
											</div>
											<div class='product-info discount-info'>
												<small class='product-info-content'>
													{{ __('Endirim') }}
												</small>
											</div>
											<div class='product-info addbookmark-button-container'>
												<div class='addToBookmark like-button'></div>
											</div>
											<div class='product-image-container'>
												<img class='product-image' src='/uploads{{ $product["images"][0]["path"] }}' />
											</div>
										</header>
										<footer class='product-footer'>
											<h4 class='product-name'>
												{{ $product["name"] }}
											</h4>
											<h5 class='product-price'>
												<span class='price'>{{ $product["price"] }}</span>
											</h5>
										</footer>
									</a>
								</div>
							</div>
						@endforeach

					</div>
				</div>
			@endif

		</div>

	</section>

@endsection