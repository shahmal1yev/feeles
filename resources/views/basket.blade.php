@extends('layouts.master')

@section('title', 'Səbət')

@section('content')
	
	<section class='py-4 p-0 m-0'>
		<div id='basketContainer' class='container-fluid'>
			<div class='row p-0 m-0'>
				<div class='col-12 col-xl-8 p-0 m-0'>
					<div class='row p-0 m-0'>

						@foreach($basketContent as $product)
							<div data-details='{!! json_encode($product) !!}' class='basket-card col-12 col-sm-6 col-lg-4 col-xl-12 p-0 m-0'>
								<a class='basket-link' href='#'>
									<div class='p-0 m-0'>
										<div class='row p-0 m-0'>
											<div class='col-12 col-xl-4 p-3 m-0'>
												<img src='https://source.unsplash.com/410x450?sig=1' class='img-fluid w-100 rounded shadow' />
											</div>
											<div class='col px-4 px-lg-4 py-3 p-0 m-0 d-flex flex-wrap align-content-between'>

												<header class='w-100 p-0 m-0'>

													<div class='d-flex justify-content-between align-items-end p-0 m-0'>
														<h5 class='text-dark-blue'>Convense</h5>

														<div class='p-0 m-0'>
															<div class='btn m-1 d-inline-block addToBookmark like-button shadow-sm'></div>
															<div class='btn m-1 d-inline-block deleteFromBasket delete-button shadow-sm'></div>
														</div>

													</div>
												</header>

												<main class='mt-2 w-100 text-muted p-0 m-0'>
													<table class='m-0 p-0 table text-muted'>
														<tr>
															<td class='px-0'>XALATLAR</td>
														</tr>
														<tr>
															<td class='px-0'>ÖLÇÜ: S</td>
														</tr>
														<tr>
															<td class='px-0'>RƏNG: Mavi</td>
														</tr>
													</table>
												</main>

												<footer class='mt-4 w-100 p-0 m-0'>

													<div class='d-flex justify-content-between align-items-end p-0 m-0'>
														
														<span class='h5 price text-dark-blue'>22.44</span>


														<div class='p-0 m-0'>
															<div class='product-quantity shadow-sm input-group'>
																<button class='decrementer shadow-none btn btn-dark bg-dark-blue text-white'>-</button>
																<input type='text' class='showing shadow-none form-control d-inline-block text-center px-1 p-0 m-0' style='max-width: 50px;' min='1' value='{{ $product["quantity"] }}' max='100' />
																<button class='incrementer shadow-none btn btn-dark bg-dark-blue text-white'>+</button>
															</div>
														</div>

													</div>

												</footer>

												
											</div>
										</div>
									</div>
								</a>
							</div>

						@endforeach

					</div>
				</div>
				<div class='col p-2 m-0'>

					<div style='top:110px;' class='position-sticky border bg-white shadow w-100 p-4 m-0'>

						<header class='py-1 p-0 m-0'>
							<h3 class='text-dark-blue text-center p-0 m-0'>
								Sifariş xülasəsi
							</h3>
						</header>

						<hr />

						<main class='p-0 m-0'>
							<table class='table'>
								<tr>
									<td>CƏM:</td>
									<td class='text-end'>
										<span class='total-price price'>22.33</span>
									</td>
								</tr>
							</table>
						</main>

						<hr />

						<footer class='d-flex justify-content-between py-1 px-1 p-0 m-0'>
							<h4 class='text-dark-blue fw-bold p-0 m-0'>
								CƏM
							</h3>
							<h4 class='text-dark-blue text-end fw-bold total-price price p-0 m-0'>
								22.44
							</h3>
						</footer>


					</div>

				</div>
			</div>
		</div>
	</section>

	<script type='text/x-tmpl' id='emptyBasketTemp'>
		@include('layouts.template.basket.empty')
	</script>

@endsection