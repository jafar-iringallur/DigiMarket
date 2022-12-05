
<!doctype html>
<html lang="en">
  <head>
  	<title>Register | Botire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('login-form/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	</head>
	<body style=" background-color: #f0f0f0;">
	<section class="ftco-section">
		<div class="container">
			{{-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #08</h2>
				</div>
			</div> --}}
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Don't have an account?</h3>

                            <form class="login-form" method="POST" action="{{ route('register') }}">
                                @csrf
                           
		      		<div class="form-group">
		      		     <input id="name" type="text" placeholder="Name" class="form-control rounded-left @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		      		</div>
		      		<div class="form-group">
		      		      <input id="email" type="email" placeholder="Email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
		      		</div>
	            <div class="form-group">
	              <input id="password" type="password" placeholder="Password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
	            </div>
	            <div class="form-group">
                    <input id="password-confirm" placeholder="Confirm-Password" type="password" class="form-control rounded-left" name="password_confirmation" required autocomplete="new-password">
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
                        <a href="{{ route('login') }}" style="font-size: 14px">Have an account?</a>
								</div>
								{{-- <div class="w-50 text-md-right">
									<a href="{{ route('password.request') }}" style="font-size: 12px">Forgot Password ?</a>
								</div> --}}
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Register</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('login-form/js/jquery.min.js') }}"></script>
	<script src="{{ asset('login-form/js/popper.js') }}"></script>
	<script src="{{ asset('login-form/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('login-form/js/main.js') }}"></script>


	</body>
</html>

