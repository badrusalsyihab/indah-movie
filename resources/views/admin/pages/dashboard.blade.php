@extends('admin.layout.master')
@section('content')

<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Overview</h1>
			    
			    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Welcome, {{auth('pegawai')->user()->namaPeg}}</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
							        <div>This is the K-sinema Portal admin dashboard. The design is simple, clean and modular making it great for managing k-sinema webs.</div>
							    </div><!--//col-->
							    
						    </div><!--//row-->
						    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					    </div><!--//app-card-body-->
					    
				    </div><!--//inner-->
			    </div><!--//app-card-->
				    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Film</h4>
							    <div class="stats-figure">{{$total_film}}</div>
							  
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Sponsor</h4>
							    <div class="stats-figure">{{$total_sponsor}}</div>
							   
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="{{ route('adminDashboardSponsor')}}"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Casting</h4>
							    <div class="stats-figure">{{$total_casting}}</div>
							    
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="{{ route('adminDashboardCasting')}}"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Pegawai</h4>
							    <div class="stats-figure">{{$total_pegawai}}</div>
							    
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="{{ route('adminDashboardCategoryFilm')}}"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			   
			    
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">K-sinema</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    	

@stop

@section('scripts')
<!-- Charts JS -->
<script src="/assets/plugins/chart.js/chart.min.js"></script> 
    <script src="/assets/js/index-charts.js"></script> 
@stop
