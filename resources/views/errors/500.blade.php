<!DOCTYPE html>
<html>
	<head>

		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0' />

		<title>{{ env("APP_NAME") . " - " . __("error.serverError") }} - 500</title>

		<!-- BOOTSTRAP 5 BETA2 -->
		<link rel='stylesheet' type='text/css' href='/assets/libs/bootstrap-5.0.0-beta2/css/bootstrap.min.css' />

		<link rel='stylesheet' type='text/css' href='/assets/css/style.css' />

		<style>

			html, body, section {
				width: 100%;
				height: 100%;
			}

			section {
				display: table;
				text-align: center;
			}

			div {
				margin: 0 auto;
				display: table-cell;
				vertical-align: middle;
				height: 100%;
				width: 100%;
			}

			img {
				max-width: 300px !important;
			}

			@media(min-width: 576px)
			{
				img {
					max-width: 400px !important;
				}
			}

			@media(min-width: 992px)
			{
				img {
					max-width: 500px !important;
				}
			}

		</style>

	</head>
	<body class='bg-light'>
		<section class='py-4 p-0 m-0'>

			<div class='container-fluid p-0 m-0' id='notFound'>

				<img src='/assets/svg/500.svg' class='p-4' />
				<h3 class='mt-5 p-0 text-muted'>{{ __('error.serverError') }}</h3>
				<a class='mt-4 px-4 btn btn-outline-dark-blue serious shadow-sm' href=''>
					{{ __('Anasəhifə') }}
				</a>

			</div>

		</section>
	</body>
</html>