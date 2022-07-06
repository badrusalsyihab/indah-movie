 <!-- Navbar Start -->
 <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="{{ route('frontHome') }}" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">KidKinder</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="{{ route('frontHome') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('frontAbout') }}" class="nav-item nav-link">About</a>
                    <a href="{{ route('frontCasting') }}" class="nav-item nav-link">Casting</a>
                    <a href="{{ route('frontTeam') }}" class="nav-item nav-link">Teachers</a>
                    <a href="{{ route('frontGallery') }}" class="nav-item nav-link">Gallery</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ route('frontBlog') }}" class="dropdown-item">Blog Grid</a>
                            <a href="#" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="{{ route('frontContact') }}" class="nav-item nav-link">Contact</a>
                </div>
                @if(Auth::guard('casting')->check())
                <a href="{{route('frontLogout')}}" class="btn btn-primary px-4">log out</a>
                @else
                <a href="#" class="btn btn-primary px-4">Join</a>
                @endif
            </div>
        </nav>
    </div>
    <!-- Navbar End -->