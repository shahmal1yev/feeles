<div class='sidebar-menu p-0 m-0' id='filterSidebar'>

	<div class='sidebar-menu-content p-0 m-0'>
		<header class='bg-dark-blue px-3 p-2 m-0'>
			<div class='row align-items-center p-0 m-0'>
				<div class='col p-0 m-0'>
					<img src="/assets/logo/logo-white.png" height="35" />
				</div>
				<div class='col p-0 m-0'>
					<div class='text-end p-0 m-0'>
						<div id='closeFilterSidebar' class='sidebar-close-button close-button' style='font-size: 1.5rem'></div>
					</div>
				</div>
			</div>
		</header>

		<main class='p-0 m-0'>

			<div class='p-0 m-0'>
				<div class='filter-container p-0 m-0'>

					<div class='filter-item p-0 m-0'>
						<h5 class='text-dark-blue bg-light px-4 py-3 p-0 mb-2 m-0'>Qiymət</h5>
						<div class='py-2 px-4 p-0 m-0'>

							<div class="input-group">
								<span class="input-group-text manat bg-white rounded-0"></span>
								<input id='filterMinPrice' type="text" placeholder="min" class="form-control shadow-none rounded-0" />
							</div>

						</div>
						<div class='py-2 px-4 p-0 m-0'>

							<div class="input-group">
								<span class="input-group-text manat bg-white rounded-0"></span>
								<input id='filterMaxPrice' type="text" placeholder="max" class="form-control shadow-none rounded-0" />
							</div>

						</div>
					</div>

					<div class='filter-item p-0 mt-2 m-0'>
						<div class='d-flex align-items-center justify-content-between bg-light px-4 py-3 p-0 mb-2 m-0'>
							<h5 class='text-dark-blue p-0 m-0'>Rəng</h5>
						</div>
						<div class='px-3 p-0 m-0'>

							<div class='p-0 m-0'>

								<div id='filterColorChooser' class='choose-color mt-2'>

									<div class='color-option' data-color='1'>
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
					</div>

					<div class='filter-item p-0 mt-2 m-0'>
						<div class='d-flex align-items-center justify-content-between bg-light px-4 py-3 p-0 mb-2 m-0'>
							<h5 class='text-dark-blue p-0 m-0'>Ölçü</h5>
						</div>
						
						<div class='px-3 p-0 m-0'>

							<div class='p-0 m-0'>

								<div id='filterSizeChooser' class='choose-size mt-2'>

									<div class='size-option' data-size='1'>
										<div class='content' data-size-text='XS'>
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

						</div>

					</div>

					<div class='filter-item p-0 mt-2 m-0'>
						<div class='d-flex align-items-center justify-content-between bg-light px-4 py-3 p-0 mb-2 m-0'>
							<h5 class='text-dark-blue p-0 m-0'>Kateqoriya</h5>
						</div>

						<div id='filterCategoryChooser' class='px-3 mt-3 choose-option'>
							
							@foreach($categories as $category)

								<div class='d-block m-2 custom-checkbox' data-id='{{ $category["id"] }}'>
									<div class='content'>
										<span class='label'>{{ $category["name"] }}</span>
										<span class='count'>1</span>
									</div>
									<span class='checkmark'></span>
								</div>

							@endforeach

						</div>

					</div>

					<div class='d-block p-0 mb-4'></div>

				</div>
			</div>

		</main>
	</div>

</div>