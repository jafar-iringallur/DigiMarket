<!doctype html>
<html lang="en">
  <head>
  	<title>Login | Botire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  
  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
   <link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
	</head>
	<body>
		<main>
			<div class="container">
		
			  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
				<div class="container">
				  <div class="row justify-content-center">
					<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
		
					  {{-- <div class="d-flex justify-content-center py-4">
						<a href="index.html" class="logo d-flex align-items-center w-auto">
						  <img src="https://www.botire.in/assets/img/logo.png" alt=""> 
						 <span class="d-none d-lg-block">NiceAdmin</span>
						</a>
					  </div><!-- End Logo --> --}}
		
					  <div class="card mb-3">
		
						<div class="card-body">
		
						  <div class="pt-4 pb-2">
							<h5 class="card-title text-center pb-0 fs-4">Login</h5>
							{{-- <p class="text-center small">Enter your username & password to login</p> --}}
						  </div>
		
						  <form class="row g-3 needs-validation" novalidate  method="POST" action="{{ route('login') }}">
							@csrf
							<div class="col-12">
							  <label for="yourUsername" class="form-label">Email</label>
							  <div class="input-group has-validation">
								{{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
								<input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
		
							  </div>
							</div>
		
							<div class="col-12">
							  <label for="yourPassword" class="form-label">Password</label>
							  <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
							  @error('password')
							  <span class="invalid-feedback" role="alert">
								  <strong>{{ $message }}</strong>
							  </span>
						  @enderror
							</div>
		
							{{-- <div class="col-12">
							  <div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
								<label class="form-check-label" for="rememberMe">Remember me</label>
							  </div>
							</div> --}}
							<div class="col-12">
							  <button class="btn btn-primary w-100" type="submit">Login</button>
							</div>
							<div class="col-12">
							  <p class="small mb-0 float-right"><a href="{{ route('register') }}">Create an account</a></p>
							</div>
							<div class="col-12">
							  <p class="small mb-0"><a class="float-right" href="{{ route('password.request') }}">Forgot Password</a></p>
							</div>
						  </form>
		
						</div>
					  </div>
		
					  <div class="credits">
						&copy; Botire Digital Solutions
					  </div>
		
					</div>
				  </div>
				</div>
		
			  </section>
		
			</div>
		  </main><!-- End #main -->
	
		  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> 
		  
			<script src="{{ asset('dashboard/js/main.js') }}"></script>

	</body>
</html>

