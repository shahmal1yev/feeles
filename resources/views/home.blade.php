@extends('layouts.master')

@section('title', 'Anasəhifə')


@section('content')

	<section class='bg-white p-0 m-0'>
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach($banners as $index => $source)
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : false }}" aria-current="true"></button>
				@endforeach
			</div>

			<div class="carousel-inner">
				@foreach($banners as $index => $source)
					
					<div class="carousel-item {{ $index == 0 ? 'active' : false }}">
						<div class='carousel-inner-container'>
							<a class='carousel-link' href='#'>
							</a>
							<img src='{{ $source }}' class='d-block bg-dark w-100' />
						</div>
					</div>

				@endforeach

			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</section>

	<section class='bg-white py-4 p-0 m-0'>
		<div class='container-fluid'>
			<div class='row p-0 m-0'>

				<div class='col-12 col-md-4 p-0 m-0'>
					<div class='category-card'>
						<img class='category-card-image' src='/uploads/subbanners/60933c1d220bd.jpg' />
						<div class='category-card-bottom'>
							<span>{{ __('Kişilər') }}</span>
						</div>
						<div class='category-card-floating-container'>
							<div class='category-card-floating-content'>
								<span class='label'>{{ __('Kişilər') }}</span>
								<hr />
								<a class='link btn btn-outline-dark-blue animating-btn action serious' href='#'>
									<i class='fas fa-dollar-sign me-2'></i>9.99-DAN
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class='col-12 col-md-4 p-0 m-0'>
					<div class='category-card'>
						<img class='category-card-image' src='/uploads/subbanners/60933c412a99d.jpg' />
						<div class='category-card-bottom'>
							<span>{{ __('Qadınlar') }}</span>
						</div>
						<div class='category-card-floating-container'>
							<div class='category-card-floating-content'>
								<span class='label'>{{ __('Qadınlar') }}</span>
								<hr />
								<a class='link btn btn-outline-dark-blue animating-btn action serious' href='#'>
									<i class='fas fa-dollar-sign me-2'></i>9.99-DAN
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class='col-12 col-md-4 p-0 m-0'>
					<div class='category-card'>
						<img class='category-card-image' src='/uploads/subbanners/60933c6ad9fad.jpg' />
						<div class='category-card-bottom'>
							<span>{{ __('Uşaqlar') }}</span>
						</div>
						<div class='category-card-floating-container'>
							<div class='category-card-floating-content'>
								<span class='label'>{{ __('Uşaqlar') }}</span>
								<hr />
								<a class='link btn btn-outline-dark-blue animating-btn action serious' href='#'>
									<i class='fas fa-dollar-sign me-2'></i>9.99-DAN
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class='bg-white py-4 p-0 m-0'>

		<div class='container-fluid'>
			<h3 class='section-header'>{{ __('Ən çox satılan') }}</h3>

			<div class='px-1 p-0 mt-5 m-0'>

				<div class='swiper-best-seller-container overflow-hidden'>
					<div class='swiper-wrapper'>

						<div class='swiper-slide'>
							<div data-id='1' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=1' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='2' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=2' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='3' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=3' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='4' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=4' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='5' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=5' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

					</div>

					<div class="swiper-custom-pagination swiper-pagination-bullet-active-products"></div>
				</div>

				<div class='text-center p-0 m-0'>
					<a href='#' class='btn btn-outline-dark-blue serious animating-btn action'>
						DAHA ÇOX
						<span class='px-1'><i class='fas fa-arrow-right'></i></span>
					</a>
				</div>

			</div>

		</div>

	</section>

	<section class='bg-white py-4 p-0 m-0'>

		<div class='container-fluid'>
			<h3 class='section-header'>{{ __('Ən çox baxılan') }}</h3>

			<div class='px-1 p-0 mt-5 m-0'>

				<div class='swiper-best-seller-container overflow-hidden'>
					<div class='swiper-wrapper'>

						<div class='swiper-slide'>
							<div data-id='6' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=6' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='7' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=7' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='8' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=8' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='9' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=9' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

						<div class='swiper-slide'>
							<div data-id='10' class='product-card'>
								<a class='product-link' href='/product.php'>
									<header class='product-header'>
										<div class='product-info viewed-info'>
											<small class='product-info-content'>
												<span class='product-viewed-info'>
													<i class='far fa-eye'></i>100
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
											<img class='product-image' src='https://source.unsplash.com/random/410x450?sig=10' />
										</div>
									</header>
									<footer class='product-footer'>
										<h4 class='product-name'>
											PRODUCT NAME
										</h4>
										<h5 class='product-price'>
											<span class='price'>28.99</span>
										</h5>
									</footer>
								</a>
							</div>
						</div>

					</div>

					<div class="swiper-custom-pagination swiper-pagination-bullet-active-products"></div>
				</div>

				<div class='text-center p-0 m-0'>
					<a href='#' class='btn btn-outline-dark-blue serious animating-btn action'>
						DAHA ÇOX
						<span class='px-1'><i class='fas fa-arrow-right'></i></span>
					</a>
				</div>

			</div>

		</div>

	</section>

	<section class='bg-white py-4 p-0 m-0'>

		<div class='container-fluid'>
			<h3 class='section-header'>{{ __('Son bloq yazıları') }}</h3>

			<div class='px-1 p-0 mt-5 m-0'>
				<div class='row p-0 m-0'>

					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>

										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>

									</div>

								</div>

							</div>
						</a>

					</div>
					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>

										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>

									</div>

								</div>

							</div>
						</a>

					</div>
					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>

										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>

									</div>

								</div>

							</div>
						</a>

					</div>
					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>

										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>

									</div>

								</div>

							</div>
						</a>

					</div>
					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>

										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>

									</div>

								</div>

							</div>
						</a>

					</div>
					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>

										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>

									</div>

								</div>

							</div>
						</a>

					</div>
					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>

										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>

									</div>

								</div>

							</div>
						</a>

					</div>
					<div class='col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-sm-1 mt-2 mt-sm-0 p-0 m-0'>
						<a class='d-block w-100 text-decoration-none p-0 m-0' href='#'>
							<div class='blog-card'>
								<div class='content-container'>

									<div class='date'>
										19 apr 2021
									</div>

									<div class='content'>

										<header>
											<h4>HTML Syntax</h4>
										</header>

										<main>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
											</p>
										</main>
										<footer>
											<small>
												{{ __('Yenilik') }}
											</small>
										</footer>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class='bg-white py-4 p-0 m-0'>

		<div class='container-fluid'>

			<h3 class='section-header'>{{ __('Populyar heşteqlər') }}</h3>

			<div class='px-1 p-0 mt-5 m-0'>

				<div class='hashtags text-center px-md-5 mx-md-3 p-0 m-0'>

						<div class='hashtag'>
							Yellow Book
						</div>

						<div class='hashtag'>
							Strong Punch
						</div>

						<div class='hashtag'>
							Polo
						</div>

						<div class='hashtag'>
							Tommy Hilfiger
						</div>

						<div class='hashtag'>
							Colorful Beat
						</div>

						<div class='hashtag'>
							Dany Tyrell
						</div>

						<div class='hashtag'>
							Goerge Orwell
						</div>

						<div class='hashtag'>
							Tommy Hilfiger
						</div>

						<div class='hashtag'>
							Colorful Beat
						</div>

						<div class='hashtag'>
							Blue Chain
						</div>

						<div class='hashtag'>
							Brightness
						</div>

						<div class='hashtag'>
							Red Martin
						</div>

						<div class='hashtag'>
							Short Stark
						</div>

						<div class='hashtag'>
							Polo
						</div>

						<div class='hashtag'>
							Convense
						</div>

						<div class='hashtag'>
							Last Star
						</div>

						<div class='hashtag'>
							Boost Train
						</div>

						<div class='hashtag'>
							Brightness
						</div>

						<div class='hashtag'>
							Red Martin
						</div>

						<div class='hashtag'>
							Qısaqol
						</div>

						<div class='hashtag'>
							Clever Flowers
						</div>

						<div class='hashtag'>
							Polo
						</div>

						<div class='hashtag'>
							Convense
						</div>

						<div class='hashtag'>
							Last Star
						</div>

						<div class='hashtag'>
							Xalatlar
						</div>

						<div class='hashtag'>
							Polo
						</div>

						<div class='hashtag'>
							Qısaqol
						</div>

						<div class='hashtag'>
							Cold Berry
						</div>

						<div class='hashtag'>
							Strong Punch
						</div>

						<div class='hashtag'>
							Goerge Orwell
						</div>

						<div class='hashtag'>
							Short Stark
						</div>

					</div>

			</div>

		</div>

	</section>

@endsection