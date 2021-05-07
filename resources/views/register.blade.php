@extends('layouts.master')

@section('title', 'Hesab - Qeydiyyat')

@section('content')

<section class='py-4 p-0 m-0'>

	<div class='container-fluid'>

		<div class='row justify-content-center p-0 m-0'>
			
			<div class='col-12 col-sm-10 col-md-7 col-lg-7 col-xl-5 py-3 p-0 m-0'>

				<div class='bg-white border rounded shadow-sm p-0 m-0'>

					<header class='bg-dark-blue py-3 p-0 m-0'>
						<h3 class='text-center text-white p-0 m-0'>Qeydiyyat</h3>
					</header>

					<main class='p-0 m-0'>

						<form class='custom-forms shadow-none border-0 p-0 mx-4 my-3 m-0' autocomplete="off">

							<div class='row flex-column flex-sm-row p-0 m-0'>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-4'>
										<div class='form-floating'>

											<input type='text' class='form-control text-input' id='firstname' placeholder='Ad' />

											<label for='firstname'>Ad</label>

										</div>
									</div>

								</div>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-4'>
										<div class='form-floating'>

											<input type='text' class='form-control text-input' id='surname' placeholder='Soyad' />

											<label for='surname'>Soyad</label>

										</div>
									</div>

								</div>
							</div>

							<div class='row p-0 m-0'>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-4'>
										<div class='form-floating'>

											<input type='text' class='form-control text-input' id='email' placeholder='Telefon nömrəsi' />

											<label for='email'>Telefon nömrəsi</label>

										</div>
									</div>

								</div>
							</div>

							<div class='row p-0 m-0'>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-4'>
										<div class='form-floating'>

											<input type='text' class='form-control text-input' id='email' placeholder='E-poçt' />

											<label for='email'>E-poçt</label>

										</div>
									</div>

								</div>
							</div>

							<div class='row flex-column flex-sm-row p-0 m-0'>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-4'>
										<div class='form-floating'>

											<input type='password' class='form-control text-input' id='password' placeholder='Şifrə' />

											<label for='password'>Şifrə</label>

										</div>
									</div>

								</div>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-4'>
										<div class='form-floating'>

											<input type='password' class='form-control text-input' id='repeatPassword' placeholder='Təkrar şifrə' />

											<label for='repeatPassword'>Təkrar şifrə</label>

										</div>
									</div>

								</div>
							</div>

							<div class='row p-0 m-0'>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-5'>

										<div class='text-center p-0 m-0'>
											<div class="form-check form-check-inline">
												<label class='custom-radio-container'>Kişi
													<input type='radio' checked name='sexType' />
													<span class='checked'></span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class='custom-radio-container'>Qadın
													<input type='radio' name='sexType' />
													<span class='checked'></span>
												</label>
											</div>
										</div>

									</div>

								</div>
							</div>

							<div class='row p-0 m-0'>
								<div class='col p-0 m-0'>
									
									<div class='custom-forms-item mt-5'>
										<button class='btn btn-outline-dark-blue effective-button rounded-0 w-100 py-2'>
											<span class='floating-background'></span>
											<div class='content'>
												TAMAMLA <span class='px-1'><i class='fas fa-play'></i></span>
											</div>
										</button>
									</div>

								</div>
							</div>

						</form>

					</main>

					<footer class='bg-light py-3 p-0 mt-5 m-0'>
							
							<div class='row p-0 m-0'>
								<div class='col p-0 m-0'>
									<div class='text-center p-0 m-0'>
										<a href='{{ route("login") }}' class='text-decoration-none text-dark-blue'>
											Daxil ol
										</a>
									</div>
								</div>
								<div class='col p-0 m-0'>
									<div class='text-center p-0 m-0'>
										<a href='{{ route("forgot-password") }}' class='text-decoration-none text-dark-blue'>
											Şifrənizi unutmusuz?
										</a>
									</div>
								</div>
							</div>

						</footer>

				</div>

			</div>
		</div>

	</div>

</section>

@endsection