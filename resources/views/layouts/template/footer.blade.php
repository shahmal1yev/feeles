@include('layouts.template.filter.result')

<section class='p-0 m-0' style='background-color: #152233;'>
	<div class='container-fluid'>
		<div class='row p-0 m-0'>
			<div class='col p-0 m-0'>
				<div class='pt-4 px-4 p-0 m-0'>
					<div class='row p-0 mt-4 m-0'>
						<div class='col-6 col-sm-6 col-md-4 col-lg py-4 p-0 m-0'>
							<h6 class='footer-item-header font-weight-bold text-white p-0 m-0'>{{ __('Biz') }}</h6>

							<ul class='list-group p-0 mt-4 m-0'>
								<li class='list-group-item bg-transparent text-muted border-0 py-1 p-0 m-0'>
									<a class='footer-link text-decoration-none text-muted' href='#'>
										{{ __("Haqqımızda") }}
									</a>
								</li>
								<li class='list-group-item bg-transparent text-muted border-0 py-1 p-0 m-0'>
									<a class='footer-link text-decoration-none text-muted' href='#'>
										{{ __("Contact") }}
									</a>
								</li>
							</ul>
						</div>
						<div class='col-6 col-sm-6 col-md-4 col-lg py-4 p-0 m-0'>
							<h6 class='footer-item-header font-weight-bold text-white p-0 m-0'>{{ __('Hesab') }}</h6>

							<ul class='list-group p-0 mt-4 m-0'>
								<li class='list-group-item bg-transparent text-muted border-0 py-1 p-0 m-0'>
									<a class='footer-link text-decoration-none text-muted' href='#'>
										{{ __("Daxil ol") }}
									</a>
								</li>
								<li class='list-group-item bg-transparent text-muted border-0 py-1 p-0 m-0'>
									<a class='footer-link text-decoration-none text-muted' href='#'>
										{{ __("Qeydiyyat") }}
									</a>
								</li>
							</ul>
						</div>
						<div class='col-6 col-sm-6 col-md-4 col-lg py-4 p-0 m-0'>
							<h6 class='footer-item-header font-weight-bold text-white p-0 m-0'>{{ __('Bloq') }}</h6>

							<ul class='list-group p-0 mt-4 m-0'>
								<li class='list-group-item bg-transparent text-muted border-0 py-1 p-0 m-0'>
									<a class='footer-link text-decoration-none text-muted' href='#'>
										{{ __("Endirimlər") }}
									</a>
								</li>
								<li class='list-group-item bg-transparent text-muted border-0 py-1 p-0 m-0'>
									<a class='footer-link text-decoration-none text-muted' href='#'>
										{{ __("Yeniliklər") }}
									</a>
								</li>
							</ul>
						</div>
						<div class='col-12 col-sm-6 col-md-4 col-lg py-4 p-0 m-0'>
							<div class='row p-0 m-0'>
								<div class='col p-0 m-0'>

									<h6 class='footer-item-header font-weight-bold text-white p-0 m-0'>{{ __('Abunə ol') }}</h6>
									<small class='d-block my-4 text-muted'>
										{{ __('Bloqa abunə olmaqla bütün yenilik və endirimlərdən xəbərdar ola bilərsiniz.') }}
									</small>
									<div class="input-group mb-3">
										<input type="text" class="form-control shadow-none outline-none border-0" placeholder="{{ __('E-poçt adresiniz') }}" />
										<button class="btn bg-white rounded" type="button" id="button-addon2">
											<i class='far fa-paper-plane text-dark-blue'></i>
										</button>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>

				<hr class='d-block w-100 mx-auto mt-4 mb-3 p-0 m-0 bg-white' />

				<div class='p-0 mb-3 m-0 position-relative text-center'>

					<button class='btn custom-btn rounded-circle position-relative overflow-hidden rounded-0 shadow-none p-0 m-0'>
						<span class='inner p-0 m-0'></span>
						<span class='m-0'><i class='fab fa-sm fa-instagram align-middle p-0 m-0'></i></span>
					</button>
					<button class='btn custom-btn rounded-circle position-relative overflow-hidden rounded-0 shadow-none p-0 m-0'>
						<span class='inner p-0 m-0'></span>
						<span class='m-0'><i class='fab fa-sm fa-facebook align-middle p-0 m-0'></i></span>
					</button>
					<button class='btn custom-btn rounded-circle position-relative overflow-hidden rounded-0 shadow-none p-0 m-0'>
						<span class='inner p-0 m-0'></span>
						<span class='m-0'><i class='fab fa-sm fa-twitter align-middle p-0 m-0'></i></span>
					</button>

				</div>

				<hr class='d-block w-100 mx-auto mb-2 p-0 m-0 bg-white' />

				<small class='d-block text-center text-white mb-2'>&copy; {{ env('APP_NAME') }} <span class='mx-1'>|</span> {{ __('Bütün hüquqları qorunur.') }}</small>

			</div>
		</div>

	</div>
</section>