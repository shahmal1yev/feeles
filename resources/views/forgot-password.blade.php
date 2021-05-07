@extends('layouts.master')

@section('title', 'Hesab - Şifrəmi unutdum')

@section('content')

<section class='py-4 p-0 m-0'>

	<div class='container-fluid'>

		<div class='row justify-content-center p-0 m-0'>

			<div class='col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 p-0 py-3 m-0'>

				<div class='bg-white border rounded shadow-sm p-0 m-0'>

					<header class='bg-dark-blue py-3 p-0 m-0'>
						<h3 class='text-center text-white p-0 m-0'>Şifrəmi unutdum</h3>
					</header>

					<main class='p-0 m-0'>

						<form class='custom-forms shadow-none border-0 p-0 mx-4 my-3 m-0' autocomplete='off'>

							<div class='row p-0 m-0'>
								<div class='col p-0 m-0'>

									<div class='custom-forms-item mt-1'>
										<div class='form-floating'>
											<input type='email' class='form-control text-input' id='email' placeholder='E-poçt' />
											<label for='email'>E-poçt</label>
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
												BƏRPA ET <span class='px-1'><i class='fas fa-hammer'></i></span>
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
									<a href='{{ route("register") }}' class='text-decoration-none text-dark-blue'>
										Qeydiyyat
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