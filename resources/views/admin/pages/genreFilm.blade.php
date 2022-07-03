@extends('admin.layout.master')
@section('content')

<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Genre Film</h1>
				    </div>
					<div class="col-auto">						    
					<a class="btn app-btn-primary" href="{{route('adminDashboardGenreForm')}}">
						+ Tambah
					</a>
			    </div><!--//row-->
			   
			    
				@if(session('success'))
    <div class="alert alert-success alert-dismissable">
        {{session('success')}}
    </div>
@endif



	@if ($message = Session::get('error'))
	  <div class="alert alert-danger alert-block">
		<strong>{{ $message }}</strong>
	  </div>
	@endif
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">nama </th>
												<th class="cell"></th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($lists as $list)
											<tr>
												<td class="cell w-100">{{$list['namaGenre']}}</td>
												<td class="cell">
													<a class="btn-sm app-btn-primary" href="{{ route('adminDashboardGenreFilmEdit', $list['idGenre']) }}">Edit</a>
												</td>
												<td class="cell">
													<a class="btn-sm app-btn-secondary" href="{{ route('adminDashboardGenreFilmDelete', $list['idGenre']) }}">Hapus</a>
												</td>
											</tr>
										@endforeach
		
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->

						
						<nav class="app-pagination">
					
							<ul class="pagination justify-content-center">
							
								<li class="page-item {{ ($lists->currentPage() == 1) ? ' disabled' : '' }}">
									<a class="page-link" href="{{ $lists->previousPageUrl() }}">Previous </a>
							    </li>
								<!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li> -->
								@for ($i = 1; $i <= $lists->lastPage(); $i++)
									<li class="page-item {{ ($lists->currentPage() == $i) ? ' active' : '' }}">
										<a class="page-link" href="{{ $lists->url($i) }}">{{ $i }}</a>
									</li>
								@endfor
								<li class="page-item">
								    <a class="page-link {{ ($lists->currentPage() == $lists->lastPage()) ? ' disabled' : '' }}" href="{{ $lists->nextPageUrl() }}">Next </a>
								</li>
							</ul>
						</nav><!--//app-pagination-->
						
			        </div><!--//tab-pane-->
			        
			       
				</div><!--//tab-content-->
				
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	   
	    
    </div><!--//app-wrapper-->    

@stop

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });
    </script>
@stop
