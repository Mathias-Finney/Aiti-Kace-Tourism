<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>AITI-KACE Tourism</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home')}}" class="nav-item nav-link active">Home</a>
                @auth
                @if (Auth::user()->isAdmin())
                    
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="package.html" class="nav-item nav-link">Packages</a>
                {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="destination.html" class="dropdown-item">Destination</a>
                        <a href="booking.html" class="dropdown-item">Booking</a>
                        <a href="team.html" class="dropdown-item">Travel Guides</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div> --}}
                @endif
                @endauth
                @auth
                <a href="{{route('login')}}" class="nav-link active">Welcome, {{Auth::user()->username}}</a>
                <div class="">
                  <form action="{{route('logout-user')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 mt-4">Log Out</button>
                  </form>
                </div> 
                @endauth
                </div>
            </div>
            @guest
            <a href="{{ route('auth.register') }}" class="btn btn-primary rounded-pill py-2 px-4" id="register">Register</a>
            <a href="{{ route('auth.login') }}" class="btn btn-primary rounded-pill py-2 px-4" id="login">Login</a>
            @endguest
        </div>
    </nav>

    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                    <p class="fs-4 text-white mb-4 animated slideInDown">Our deepest satisfaction is your fun and safety</p>
                    <div class="position-relative w-75 mx-auto animated slideInDown">
                        <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Aburi Gardens">
                        <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>