@extends('layouts.master')

@section('title', 'Məhsullar - Lacoste, Sviter / Kardiqan')

@section('content')

<section id='product' data-id='1' class='bg-white p-0 m-0'>

	<div class='container-fluid'>

		<div class='row flex-column flex-lg-row py-5 p-0 m-0'>

			<div class='col-12 col-lg-6 p-0 m-0'>
				
				<div class='images-slider px-2 px-lg-3 px-xl-4 p-0 m-0'>

					<ul id='lightSlider'>

						<li class='image-slide-item shadow-sm' data-src='https://source.unsplash.com/random/410x450?sig=1' data-thumb='https://source.unsplash.com/random/410x450?sig=1'>
							<img src='https://source.unsplash.com/random/410x450?sig=1' />
						</li>

						<li class='image-slide-item shadow-sm' data-src='https://source.unsplash.com/random/410x450?sig=2' data-thumb='https://source.unsplash.com/random/410x450?sig=2'>
							<img src='https://source.unsplash.com/random/410x450?sig=2' />
						</li>

						<li class='image-slide-item shadow-sm' data-src='https://source.unsplash.com/random/410x450?sig=3' data-thumb='https://source.unsplash.com/random/410x450?sig=3'>
							<img src='https://source.unsplash.com/random/410x450?sig=3' />
						</li>

					</ul>

				</div>

			</div>
			<div class='col p-0 mt-5 mt-lg-0 m-0'>

				<div class='px-2 px-lg-3 px-xl-4 p-0 m-0'>

					<header class='text-center text-lg-start p-0 m-0'>
						<h2 class='text-dark-blue p-0 m-0'>
							Converse
						</h2>
						<small class='d-block text-muted p-0 mt-3 m-0'>XALATLAR</small>
						<h4 id='price' class='price text-dark-blue p-0 mt-3 m-0'>22.99</h4>
					</header>

					<hr class='d-block p-0 my-4 m-0 w-100' />

					<article class='text-center text-lg-start p-0 m-0 fs-6'>

						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

					</article>

					<hr class='d-block p-0 my-4 m-0 w-100' />

					<div class='p-0 m-0'>
						<div class='p-0 m-0'>
							<span class='d-block text-center fw-bold p-0 m-0'>Ölçü</span>

							<div id='productSizeChooser' class='choose-size mt-2'>
								<div class='size-option' data-size='1'>
									<div class='content active' data-size-text='XS'>
									</div>
								</div>

								<div class='size-option' data-size='2'>
									<div class='content' data-size-text='S'>
									</div>
								</div>

								<div class='size-option' data-size='3'>
									<div class='content' data-size-text='M'>
									</div>
								</div>

								<div class='size-option' data-size='4'>
									<div class='content' data-size-text='L'>
									</div>
								</div>

								<div class='size-option' data-size='5'>
									<div class='content' data-size-text='XL'>
									</div>
								</div>

								<div class='size-option' data-size='6'>
									<div class='content' data-size-text='XXL'>
									</div>
								</div>
							</div>
						</div>
						<div class='p-0 mt-2 m-0'>
							<span class='d-block text-center fw-bold p-0 m-0'>Rəng</span>
							
							<div id='productColorChooser' class='choose-color mt-2'>

								<div class='color-option active' data-color='1'>
									<div class='content' style='background-color: #dc3545;'></div>
								</div>

								<div class='color-option' data-color='2'>
									<div class='content' style='background-color: #198754;'></div>
								</div>

								<div class='color-option' data-color='3'>
									<div class='content' style='background-color: #0d6efd;'></div>
								</div>

								<div class='color-option' data-color='4'>
									<div class='content' style='background-color: #ffc107;'></div>
								</div>

								<div class='color-option' data-color='5'>
									<div class='content' style='background-color: #212529;'></div>
								</div>

								<div class='color-option' data-color='6'>
									<div class='content' style='background-color: #6c757d;'></div>
								</div>

								<div class='color-option' data-color='7'>
									<div class='content' style='background-color: #343a40;'></div>
								</div>

								<div class='color-option' data-color='8'>
									<div class='content' style='background-color: #f8f9fa;'></div>
								</div>	

							</div>

						</div>

					</div>

					<hr class='d-block p-0 my-4 m-0 w-100' />

					<table class='mt-3 m-0 table table-hover w-100'>
						<tbody>
							<tr>
								<td class='fw-bold'>Baxış sayı</td>
								<td class='text-end'>153</td>
							</tr>
							<tr>
								<td class='fw-bold'>Bəyənilmə sayı</td>
								<td class='text-end'>26</td>
							</tr>
							<tr>
								<td class='fw-bold'>Stokda mövcuddur</td>
								<td class='text-end'>13</td>
							</tr>
						</tbody>
					</table>

					<hr class='d-block p-0 my-4 m-0 w-100' />

					<div class='p-0 m-0'>
						<div class='row flex-column flex-sm-row flex-md-row flex-lg-column flex-xl-row justify-content-between p-0 m-0'>
							<div class='col block-bookmark-basket-buttons-container p-0 m-0'>
								<button id='addToBasket' class='block-bookmark-basket-button basket btn btn-outline-dark-blue effective-button rounded-0 w-100 py-2 fs-5' data-fill-text='Səbətə əlavə et' data-active-text='Səbətə əlavə edildi' data-error-text='Server xətası'>
								</button>
							</div>

							<div class='col block-bookmark-basket-buttons-container p-0 m-0'>
								<button id='addToBookmark' class='block-bookmark-basket-button bookmark btn btn-outline-danger effective-button rounded-0 w-100 py-2 fs-5' data-product-id='1' data-fill-text='Seçilmişlərə əlavə et' data-active-text='Seçilmişlərə əlavə edildi'>
								</button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</section>

@endsection