<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>K-sinema | Portal</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="K-sinema | Portal">
    <meta name="author" content="K-sinema Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper" style="height: 100%">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Register</h2>					
	
             
					@if(session('success'))
    <div class="alert alert-success alert-dismissable">
        {{session('success')}}
    </div>
@endif

<!-- @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" id="formMessage" role="alert">
        {{ $error }}
    </div>
    @endforeach
@endif -->

					<div class="auth-form-container text-start mx-auto">
						<form action="{{ route('frontSignUpSponsorStore') }}" method="post" enctype="multipart/form-data" class="auth-form auth-signup-form">         
							<div class="email mb-3">
								@if($errors->has('nik'))
									<label class="text-danger" for="inputError">{{ $errors->first('nik') }}</label>
								@endif
								<input id="signup-nik" name="nik" value="{{ old('nik') }}" type="text" class="form-control signup-nik" placeholder="Nik">
							</div>
							<div class="email mb-3">
								@if($errors->has('npwp'))
									<label class="text-danger" for="inputError">{{ $errors->first('npwp') }}</label>
								@endif
								<input id="signup-name" name="npwp" value="{{ old('npwp') }}" type="text" class="form-control signup-npwp" placeholder="npwp">
							</div>
							<div class="email mb-3">
								@if($errors->has('namaSponsor'))
									<label class="text-danger" for="inputError">{{ $errors->first('namaSponsor') }}</label>
								@endif
								<input id="signup-name" name="namaSponsor" value="{{ old('namaSponsor') }}" type="text" class="form-control signup-name" placeholder="nama">
							</div>
							<div class="email mb-3">
								@if($errors->has('phoneSponsor'))
									<label class="text-danger" for="inputError">{{ $errors->first('phoneSponsor') }}</label>
								@endif
								<input id="signup-name" name="phoneSponsor" value="{{ old('phoneSponsor') }}" type="text" class="form-control signup-name" placeholder="phone">
							</div>
							<div class="email mb-3">
								@if($errors->has('emailSponsor'))
									<label class="text-danger" for="inputError">{{ $errors->first('emailSponsor') }}</label>
								@endif
								<input id="signup-name" name="emailSponsor" value="{{ old('emailSponsor') }}" type="email" class="form-control signup-name" placeholder="Email">
							</div>
							<div class="password mb-3">
								@if($errors->has('passwordSponsor'))
									<label class="text-danger" for="inputError">{{ $errors->first('passwordSponsor') }}</label>
								@endif
								<input id="signup-password" name="passwordSponsor" type="password" class="form-control signup-password" placeholder="Create a password">
							</div>
							
							
							<div class="mb-5">
							@if($errors->has('alamatSponsor'))
									<label class="text-danger" for="inputError">{{ $errors->first('alamatSponsor') }}</label>
								@endif
								<textarea name="alamatSponsor" value="{{ old('alamatSponsor') }}" class="form-control" rows="6" id="alamat" placeholder="Alamat" style="height: 100%"></textarea>
							
							</div>
							
							<!-- <div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
									<label class="form-check-label" for="RememberPassword">
									I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
									</label>
								</div>
							</div> -->
							<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Submit</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="{{route('frontLogin')}}" >Log in</a></div>
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
			  	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				   
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
        $('.datepicker').datepicker({
           // calendarWeeks: true
});
      </script>

</html> 

