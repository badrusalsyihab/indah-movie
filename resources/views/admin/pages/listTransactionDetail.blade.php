@extends('admin.layout.master')
@section('content')

<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">	
         

			    <h1 class="app-page-title">Update Status Casting</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Form</h3>
		                <div class="section-intro">Anda dapat merubah status pada form input berikut </div>
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
							    <form action="{{route('adminDashboardCastingUpdateStatus')}}" method="post" class="settings-form">
								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Code<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
									    <input type="text" name="id" class="form-control" value="{{ $detail['idTrxCasting'] }}" id="setting-input-1" readOnly>
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Film<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
									    <input type="text" name="nama" class="form-control" value="{{ $detail['master_film']['judulFilm'] }}" id="setting-input-1" readOnly>
                                      
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Name<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $detail['master_peserta_casting']['nama'] }}" id="setting-input-1" readOnly>
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Status</label>
                                        <select name="status" class="form-control custom-select px-4">
                                        <option value="Menunggu" selected>Menunggu</option>
                                        <option value="Disetujui">Disetujui</option>
                                        <option value="Ditolak">Ditolak</option>
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
