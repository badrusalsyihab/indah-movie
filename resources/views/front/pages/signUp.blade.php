<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
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
						<form action="{{ route('frontSignUpCastingStore') }}" method="post" enctype="multipart/form-data" class="auth-form auth-signup-form">         
							<div class="email mb-3">
								@if($errors->has('nik'))
									<label class="text-danger" for="inputError">{{ $errors->first('nik') }}</label>
								@endif
								<input id="signup-email" name="nik" value="{{ old('nik') }}" type="text" class="form-control signup-email" placeholder="Nik">
							</div>
							<div class="email mb-3">
								@if($errors->has('nama'))
									<label class="text-danger" for="inputError">{{ $errors->first('nama') }}</label>
								@endif
								<input id="signup-name" name="nama" value="{{ old('nama') }}" type="text" class="form-control signup-name" placeholder="Full name">
							</div>
							<div class="email mb-3">
								@if($errors->has('email'))
									<label class="text-danger" for="inputError">{{ $errors->first('email') }}</label>
								@endif
								<input id="signup-name" name="email" value="{{ old('email') }}" type="email" class="form-control signup-name" placeholder="Email">
							</div>
							<div class="password mb-3">
								@if($errors->has('password'))
									<label class="text-danger" for="inputError">{{ $errors->first('password') }}</label>
								@endif
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Create a password">
							</div>
							
							<div class="email mb-3">
								@if($errors->has('npwp'))
									<label class="text-danger" for="inputError">{{ $errors->first('npwp') }}</label>
								@endif
								<input id="signup-name" name="npwp" value="{{ old('npwp') }}" type="text" class="form-control signup-name" placeholder="Npwp">
							</div>
							<div class="email mb-3">
								@if($errors->has('gender'))
									<label class="text-danger" for="inputError">{{ $errors->first('gender') }}</label>
								@endif
								<select name="gender" class="form-control signup-name">
                                        <option selected value="">Select Gender</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
							</div>
							<div class="email mb-3">
							@if($errors->has('tempatLahir'))
									<label class="text-danger" for="inputError">{{ $errors->first('tempatLahir') }}</label>
								@endif
								<input id="signup-name" name="tempatLahir" value="{{ old('tempatLahir') }}" type="text" class="form-control signup-name" placeholder="Tempat Lahir">
							</div>
							<div class="email mb-3">
							@if($errors->has('tglLahir'))
									<label class="text-danger" for="inputError">{{ $errors->first('tglLahir') }}</label>
								@endif
								<input name="tglLahir" class="datepicker form-control" placeholder="Tanggal Lahir" data-date-format="mm/dd/yyyy">
							</div>
							
							<div class="email mb-3">
							@if($errors->has('phone'))
									<label class="text-danger" for="inputError">{{ $errors->first('phone') }}</label>
								@endif
								<input id="signup-name" name="phone" value="{{ old('phone') }}" type="text" class="form-control signup-name" placeholder="Phone">
							</div>
							<div class="email mb-3">
							@if($errors->has('linkVideoProfil'))
									<label class="text-danger" for="inputError">{{ $errors->first('linkVideoProfil') }}</label>
								@endif
								<input id="signup-name" name="linkVideoProfil" value="{{ old('linkVideoProfil') }}" type="text" class="form-control signup-name" placeholder="Link Video Profil">
							</div>
							<div class="email mb-3">
							@if($errors->has('linkInstagram'))
									<label class="text-danger" for="inputError">{{ $errors->first('linkInstagram') }}</label>
								@endif
								<input id="signup-name" name="linkInstagram" value="{{ old('linkInstagram') }}" type="text" class="form-control signup-name" placeholder="Link Instagram">
							</div>
							<div class="email mb-3">
							@if($errors->has('linkVideoAkting'))
									<label class="text-danger" for="inputError">{{ $errors->first('linkVideoAkting') }}</label>
								@endif
								<input id="signup-name" name="linkVideoAkting" value="{{ old('linkVideoAkting') }}" type="text" class="form-control signup-name" placeholder="Link Video Akting">
							</div>
							<div class="mb-3">
							@if($errors->has('fileKTP'))
									<label class="text-danger" for="inputError">{{ $errors->first('fileKTP') }}</label>
								@endif
                                <input name="fileKTP" class="form-control signup-name" type="file">
								<label class="custom-file-label" for="customFileLang">*Upload File Ktp</label>
							</div>
							<div class="mb-3">
							@if($errors->has('fileBiodata'))
									<label class="text-danger" for="inputError">{{ $errors->first('fileBiodata') }}</label>
								@endif
                                <input name="fileBiodata" class="form-control signup-name" type="file">
								<label class="custom-file-label" for="customFileLang">*Upload fileBiodata</label>
							
							</div>
							<div class="mb-3">
							@if($errors->has('fotoGrid'))
									<label class="text-danger" for="inputError">{{ $errors->first('fotoGrid') }}</label>
								@endif
                                <input name="fotoGrid" class="form-control signup-name" type="file">
								<label class="custom-file-label" for="customFileLang">*Upload fotoGrid </label>
							</div>
							
							<div class="mb-5">
							@if($errors->has('alamat'))
									<label class="text-danger" for="inputError">{{ $errors->first('alamat') }}</label>
								@endif
								<textarea name="alamat" value="{{ old('alamat') }}" class="form-control" rows="6" id="alamat" placeholder="Alamat" style="height: 100%"></textarea>
							
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

