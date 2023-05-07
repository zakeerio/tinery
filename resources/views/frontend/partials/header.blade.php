<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('frontend/images/LOGO.png') }}" alt="Company Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="{{ route('itineraries') }}">Discover</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary  rounded-pill px-4" href="#membership">Become a Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="#login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
  <!-- /.navbar -->
