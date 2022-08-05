@extends('admin.layout.master')
@section('content')

<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">List Sponsor</h1>
				    </div>
                    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form action="{{ route('adminDashboardSponsorTransactionSearch') }}" method="post" class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="nama" class="form-control search-orders" placeholder="Nama">
					                    </div>
                                        <div class="col-auto">
					                        <input type="text" id="search-orders" name="film" class="form-control search-orders" placeholder="Film">
					                    </div>
                                        <div class="col-auto">
								    <select name="status" class="form-select w-auto">
										  <option value="">Status</option>
										  <option value="Menunggu">Menunggu</option>
										  <option value="Disetujui">Disetujui</option>
										  <option value="Ditolak">Ditolak</option>
										  
									</select>
							    </div>
					                    <div class="col-auto">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
							   
							 
						    </div><!--//row-->
					    </div><!--//table-utilities-->
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
												<th class="cell">ID</th>
												<th class="cell">Nama</th>
												<th class="cell">Film</th>
                                                <th class="cell">Donasi</th>
												<th class="cell">Keterangan</th>
												<th class="cell">Status</th>
                                                <th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($lists as $list)
											<tr>
												<td class="cell">{{$list['idTrxSponsor']}}</td>
												<td class="cell"><span class="truncate">{{$list['master_sponsor']['namaSponsor']}}</span></td>
												<td class="cell">{{$list['master_film']['judulFilm']}}</td>
												<td class="cell">{{$list['donasiSponsor']}}</td>
												<td class="cell">
                                                    @if($list['statusTransaksi'] == "Disetujui")
                                                    <span class="badge bg-success"><strong>{{$list['statusTransaksi']}}</strong></span>
                                                   @elseif($list['statusTransaksi'] == "Menunggu")
                                                   <span class="badge bg-warning"><strong>{{$list['statusTransaksi']}}</strong></span>
                                                   @else
                                                    <span class="badge bg-danger"><strong>{{$list['statusTransaksi']}}</strong></span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                @if($list['statusTransaksi'] == "Menunggu")
                                                    <a class="btn-sm app-btn-secondary" href="{{ route('adminDashboardSponsorDetailTransaction', $list['idTrxSponsor']) }}">Update Status</a>
                                                @else
                                                    <a class="btn disabled" href="#">Update Status</a>
                                                @endif
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
@stop
