<section class='bg-white p-0 m-0 position-sticky shadow-sm' style='top: 0; z-index: 99;'>

	<div class='container-fluid p-0 m-0'>

		<nav class="navbar navbar-expand-sm navbar-light navbar-css bg-white">
			<div class="container-fluid flex-nowrap">

				<a class="navbar-brand p-0 me-1 me-sm-5 m-0" href=''>
					<img src="/assets/logo/logo-black.png" height="30">
				</a>

				<ul class="navbar-nav flex-row justify-content-center justify-content-lg-end p-0 m-0">
					<li class='nav-item d-none d-md-block mx-2 border-end'>
					</li>
					<li class='nav-item px-3 px-sm-3'>
						<a class='nav-link nav-icon-link' href=''>
							<i class='fas fa-shopping-bag icon-custom-1x'></i>
							<span class='d-none d-lg-inline-block mx-2'>{{ __('Səbət') }}</span>
						</a>
					</li>
					<li class='nav-item d-none d-md-block mx-2 border-end'>
					</li>
					<li class='nav-item px-3 px-sm-3'>
						<a class='nav-link nav-icon-link' href='#'>
							<i class='far fa-heart icon-custom-1x'></i>
							<span class='d-none d-lg-inline-block mx-2'>{{ __('Seçilmişlər') }}</span>
						</a>
					</li>
					<li class='nav-item d-none d-md-block mx-2 border-end'>
					</li>
					<li class='nav-item px-3 px-sm-3'>
						<div class='nav-link nav-icon-link'>
							<div class='dropdown position-relative'>
								<a class='dropdown-toggle text-dark text-decoration-none' type='button' id='accountDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
									<i class='far fa-user icon-custom-1x text-dark'></i>
									<span class='d-none d-lg-inline-block mx-2'>{{ __('Hesab') }}</span>
								</a>
								<ul class='dropdown-menu dropdown-menu-end position-absolute' aria-labelledby='accountDropdown'>
									<li>
										<a class='dropdown-item' href=''>{{ __('Daxil ol') }}</a>
									</li>
									<li>
										<a class='dropdown-item' href=''>{{ __('Qeydiyyat') }}</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class='nav-item d-none d-md-block mx-2 border-end'>
					</li>
					<li class='nav-item px-3 px-sm-3'>
						<div class='nav-link nav-icon-link'>
							<div class='dropdown position-relative'>
								<a class='dropdown-toggle text-dark text-decoration-none' type='button' id='languageDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
									<i class='fas fa-globe icon-custom-1x text-dark'></i>
									<span class='d-none d-lg-inline-block mx-2'>{{ __('Dil') }}</span>
								</a>
								<ul class='dropdown-menu dropdown-menu-end position-absolute' aria-labelledby='languageDropdown'>
									<li>
										<a class='dropdown-item' href='#'>{{ __('AZ') }}</a>
									</li>
									<li>
										<a class='dropdown-item' href='#'>{{ __('EN') }}</a>
									</li>
									<li>
										<a class='dropdown-item' href='#'>{{ __('RU') }}</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class='nav-item d-none d-xl-block mx-2 border-end'>
					</li>
					<li class='nav-item d-none d-xl-block px-0 px-sm-2'>
						<a href='#' class='nav-link d-inline-block'>
							<i class='fab fa-instagram'></i>
						</a>
						<a href='#' class='nav-link d-inline-block'>
							<i class='fab fa-facebook'></i>
						</a>
						<a href='#' class='nav-link d-inline-block'>
							<i class='fab fa-twitter'></i>
						</a>
					</li>
				</ul>
			</div>
		</nav>

	</div>

	<div class='container-fluid border-top p-0 m-0'>
		<div class='scroller-nav-container'>
			<nav class='scroller-nav'>
				<div class='scroller-nav-inner'>
					<a href='' class='scroller-nav-link btn btn-outline-dark-blue active'>
						<span class='scroller-nav-label' data-fill='{{ __("Anasəhifə") }}'>{{ __("Anasəhifə") }}</span>
					</a>
					<a href='#' class='scroller-nav-link btn btn-outline-dark-blue' id='openFilterSidebar'>
						<span class='scroller-nav-label' data-fill='{{ __("Filter") }}'>{{ __("Filter") }}</span>
						<span class='mx-1'><i class='fas fa-chevron-right'></i></span>
					</a>
					<a href='' class='scroller-nav-link btn btn-outline-dark-blue'>
						<span class='scroller-nav-label' data-fill='{{ __("Bloq") }}'>{{ __("Bloq") }}</span>
					</a>
					<a href='#' class='scroller-nav-link btn btn-outline-dark-blue'>
						<span class='scroller-nav-label' data-fill='{{ __("Haqqımızda") }}'>{{ __("Haqqımızda") }}</span>
					</a>
					<a href='' class='scroller-nav-link btn btn-outline-dark-blue'>
						<span class='scroller-nav-label' data-fill='{{ __("Əlaqə") }}'>{{ __("Əlaqə") }}</span>
					</a>
				</div>
			</nav>
		</div>
	</div>

</section>

@include('layouts.template.filter.sidebar')