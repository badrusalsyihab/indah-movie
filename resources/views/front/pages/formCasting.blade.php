@extends('front.layout.master')
@section('content')

 <!-- Contact Start -->
 <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Casting Films</span></p>
                <h1 class="mb-4">take part with our film</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                    @if(session('success'))
    <div class="alert alert-success alert-dismissable">
        {{session('success')}}
    </div>
@endif
                        
                        <form action="{{ route('frontCastingFormPostFilm') }}" method="post">
                            <div class="control-group">
                                    <select name="idFilm" class="custom-select px-4">
                                        <option selected value="">Select A Film</option>
                                        @if(!empty($lists))
                                        @foreach($lists as $list)
                                        @if(request()->get('film') == $list['judulFilm'])
                                        <option value="{{$list['idFilm']}}" selected>{{$list['judulFilm']}}</option>
                                        @else
                                        <option value="{{$list['idFilm']}}">{{$list['judulFilm']}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    <p class="help-block text-danger">{{ $errors->first('idFilm') }}</p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" value={{Auth::guard('casting')->user()->email}}  class="form-control" id="email" placeholder="Email" readOnly />
                                <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                            </div>
                           
                            <div class="control-group">
                                <textarea name="pengajuanKarakter" class="form-control" rows="6" id="alamat" placeholder="pengajuan Karakter" ></textarea>
                                <p class="help-block text-danger">{{ $errors->first('pengajuanKarakter') }}</p>
                            </div>
                            
                            <div>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <p>The following casting notices display productions and roles for movies. You can further refine your search by using the filters and save your search to have new casting notices sent directly to your email.</p>
                    <div class="d-flex">
                        <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Address</h5>
                            <p>123 Street, New York, USA</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Email</h5>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Phone</h5>
                            <p>+012 345 67890</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Opening Hours</h5>
                            <strong>Sunday - Friday:</strong>
                            <p class="m-0">08:00 AM - 05:00 PM </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@stop

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
        $('.datepicker').datepicker({
           // calendarWeeks: true
});
      </script>
@stop
