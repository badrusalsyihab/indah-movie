@extends('admin.layout.master')
@section('content')

<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Casting</h1>
				    </div>
				   
			    </div><!--//row-->
			   
			    
			   
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Nik</th>
												<th class="cell">nama</th>
												<th class="cell">gender</th>
												<th class="cell">email</th>
												<th class="cell">tempatLahir</th>
												<th class="cell">phone</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($lists as $list)
											<tr>
												<td class="cell">{{$list['nik']}}</td>
												<td class="cell"><span class="truncate">{{$list['nama']}}</span></td>
												<td class="cell">{{$list['gender']}}</td>
												<td class="cell">{{$list['email']}}</td>
												<td class="cell">{{$list['tempatLahir']}}</td>
												<td class="cell">{{$list['phone']}}</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('adminDashboardCastingDetail', $list['idPeserta'])}}">View</a></td>
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
@stop
