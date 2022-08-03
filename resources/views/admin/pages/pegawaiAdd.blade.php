@extends('admin.layout.master')
@section('content')

<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">	
         

			    <h1 class="app-page-title">Form</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Form</h3>
		                <div class="section-intro">Anda dapat menambahkan Pegawai pada form input berikut </div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
                               
            @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" id="formMessage" role="alert">
        {{ $error }}
    </div>
    @endforeach
@endif

						    <div class="app-card-body">
							    <form action="{{route('adminDashboardPegawaiStore')}}" method="post" class="settings-form">
								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Nik
  </label>
									    <input type="text" name="nik" class="form-control" id="setting-input-1">
									</div>

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Name
  </label>
									    <input type="text" name="namaPeg" class="form-control" id="setting-input-1">
									</div>

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Phone
  </label>
									    <input type="text" name="phonePeg" class="form-control" id="setting-input-1">
									</div>

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Email
  </label>
									    <input type="text" name="emailPeg" class="form-control" id="setting-input-1">
									</div>

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Password
  </label>
									    <input type="password" name="passwordPeg" class="form-control" id="setting-input-1">
									</div>

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Gender
  </label>  
                                        <select name="genderPeg" class="form-select" id="setting-input-1">
										  <option value="">Gender</option>
										  <option value="Laki-laki">Laki-laki</option>
										  <option value="Perempuan">Perempuan</option>
									    </select>
									   
									</div>

                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Status
  </label>
  <select name="statusNikah" class="form-select" id="setting-input-1">
										  <option value="">Status</option>
										  <option value="Lajang">Lajang</option>
										  <option value="Menikah">Menikah</option>
										  <option value="Cerai Hidup">Cerai Hidup</option>
                                          <option value="Cerai Mati">Cerai Mati</option>
									    </select>
									    
									</div>

                                   
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
									<button type="submit" class="btn app-btn-primary" >Save</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
              
               
              
			  
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	   
	    
    </div><!--//app-wrapper-->    	

@stop

@section('scripts')
@stop
