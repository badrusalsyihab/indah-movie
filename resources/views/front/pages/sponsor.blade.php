@extends('front.layout.master')
@section('content')

 <!-- Class Start -->
 <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Sponsor Films</span></p>
                <h1 class="mb-4">take part with our film</h1>
            </div>
            <div class="row">
                @if(!empty($lists))
                @foreach($lists as $list)
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                    
                        <img class="card-img-top mb-2" src="{{ URL::asset('/asset_films/'.$list['gambar']) }}" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$list['judulFilm']}}</h4>
                            <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($list['keterangan'], 150, '...') }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>kategori</strong></div>
                                <div class="col-6 py-1">{{ \Illuminate\Support\Str::limit($list['master_kategori_film']['namaKategori'], 12, '..') }}</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Genre</strong></div>
                                <div class="col-6 py-1"> {{ \Illuminate\Support\Str::limit($list['master_genre_film']['namaGenre'], 12, '..') }}</div>
                            </div>
                            <!-- <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Casting</strong></div>
                                <div class="col-6 py-1">{{$list['statusCasting']}}</div>
                            </div> -->
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Date</strong></div>
                                <div class="col-6 py-1">{{date('d F Y', strtotime($list['createdAt']))}}</div>
                            </div>
                        </div>
                        
                        <a href="{{route('frontSponsorForm', ['film' => $list['judulFilm']])}}" class="btn btn-primary px-4 mx-auto mb-4">Sponsor Now</a>
                       
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Class End -->


    <!-- Registration Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5"><span class="pr-2">Book A Seat</span></p>
                    <h1 class="mb-4">Book A Seat For Your Kid</h1>
                    <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                        ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor</p>
                    <ul class="list-inline m-0">
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Labore eos amet dolor amet diam</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Etsea et sit dolor amet ipsum</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Diam dolor diam elitripsum vero.</li>
                    </ul>
                    <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Book A Seat</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Your Name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px;">
                                        <option selected>Select A Class</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 1</option>
                                        <option value="3">Class 1</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Registration End -->

@stop

@section('scripts')
@stop
