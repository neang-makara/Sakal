<!doctype html>
<html lang="en">
  <head>
	<title>Reset Password</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
	<style>
		body{
			height: 100vh;
		}
	</style>
		<div class="container-fluid">
			<div class="row" style="display: flex;justify-content:center;align-items:center;height:80vh;">
				<div class="col-xs-5 col-md-5 col-lg-5 card p-5">
					<h4 class="card-title">Reset Password</h4>
					<div class="col-12">
						@if(Session::has('error-email'))
							<div class="alert alert-danger alert-dismissible">
								<p class="mb-0">
									<i class="icon fas fa-info"></i>{{ Session::get('error-email') }}
								</p>
							</div>
						@endif
						@if ($errors->any())
							<div class="alert alert-danger alert-dismissible">
								<h6>
									<i class="icon fas fa-ban"></i> Validation exist!
								</h6>
								@foreach ($errors->all() as $error)
									<p class="mb-0">
										<i class="icon fas fa-info"></i>{{ $error }}
									</p>
								@endforeach
							</div>
						@endif
					</div>
					<form method="POST" class="my-login-validation" novalidate="" action="{{ route('reset.password.post') }}">
						@csrf
						<input type="hidden" name="token" value="{{ $token }}">
						<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" class="form-control" name="email" placeholder="Email address" value="{{ $email ?? old('email') }}">
							<span class="text-danger"></span>
						</div>
						<div class="form-group">
							<label for="password">New Password</label>
							<input id="password" type="password" class="form-control" name="password" placeholder="Enter new password">
							<span class="text-danger"></span>
						</div>
						<div class="form-group">
							<label for="password-confirm">Confirm Password</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password">
							<span class="text-danger"></span>
						</div>

						<div class="form-group m-0">
							<button type="submit" class="btn btn-primary btn-block">
								Reset Password
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>