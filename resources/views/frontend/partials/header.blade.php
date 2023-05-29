<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('frontend/images/LOGO.png') }}" alt="Company Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="ms-auto navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="{{ route('itineraries') }}">Discover</a>
                    </li>
                    {{-- check user loggedin --}}

                    @if(Auth::guard('user')->user())
                        <div class="profile-item d-flex justify-content-between align-items-center">
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('/profile')}}">
                                    @if(Auth::guard('user')->user()->profile != '')
                                    <img src="{{ asset('frontend/profile_pictures/'.Auth::guard('user')->user()->profile) }}" width="100%" height="50px" alt="Profile Image">
                                    @else
                                    <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" width="100%" height="50px" alt="Profile Image">
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger  rounded-pill px-4" href="{{url('/create_itinerary_load')}}">+ Add Itinerary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('logout') }}"><img src="{{ asset('frontend/images/logout.png') }}" alt=" logout link"></a>
                            </li>
                        </div>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-secondary  rounded-pill px-4" href="javascript:void(0)" data-target="#userregistration" data-toggle="modal">Become a Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-clr" href="javascript:void(0)" data-target="#userlogin" data-toggle="modal">Login</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>
  <!-- /.navbar -->
