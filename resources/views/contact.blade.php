@extends('layouts.master')

@section('title', 'Əlaqə')

@section('content')

	<section class='bg-white py-4 p-0 m-0'>

		<div class='container-fluid'>

			<div class='row align-items-start justify-content-center p-0 m-0'>

				<div class='client-feedback-background d-none d-md-block col-md-6 col-lg-5 col-xl-4 p-0 m-0'>

				</div>
				<div class='col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 p-0 m-0'>

					<div class='px-2 p-0 m-0'>


						<main class='p-0 m-0'>

							<form class='custom-forms shadow-none border-0 p-0 mx-4 my-3 m-0' autocomplete='off'>

								<div class='row p-0 m-0'>
									<div class='col p-0 m-0'>

										<div class='custom-forms-item mt-3'>
											<div class='form-floating'>
												<input type='name' class='form-control text-input' id='name' placeholder='Adınız' />
												<label for='name'>Adınız</label>
											</div>
										</div>

									</div>
								</div>
								<div class='row p-0 m-0'>
									<div class='col p-0 m-0'>

										<div class='custom-forms-item mt-3'>
											<div class='form-floating'>
												<input type='surname' class='form-control text-input' id='surname' placeholder='Soyadınız' />
												<label for='surname'>Soyadınız</label>
											</div>
										</div>

									</div>
								</div>
								<div class='row p-0 m-0'>
									<div class='col p-0 m-0'>

										<div class='custom-forms-item mt-3'>
											<div class='form-floating'>
												<input type='email' class='form-control text-input' id='email' placeholder='E-poçtunuz' />
												<label for='email'>E-poçtunuz</label>
											</div>
										</div>

									</div>
								</div>
								<div class='row p-0 m-0'>
									<div class='col p-0 m-0'>

										<div class='custom-forms-item mt-3'>
											<div class='form-floating'>
												<textarea class='form-control text-input' id='message' placeholder='Mesajınız'></textarea>
												<label for='message'>Mesajınız</label>
											</div>
										</div>

									</div>
								</div>

								<div class='row p-0 m-0'>
									<div class='col p-0 m-0'>
										<div class='custom-forms-item mt-5'>
											<button class='d-block w-100 btn btn-outline-dark-blue serious'>
												GÖNDƏR <span class='px-1'><i class='far fa-paper-plane'></i></span>
											</button>
										</div>

									</div>
								</div>

							</form>

						</main>

					</div>

				</div>

			</div>

		</div>

	</section>

@endsection