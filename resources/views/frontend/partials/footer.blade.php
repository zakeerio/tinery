<footer class="footer py-4  ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="row mt-5 px-4">
                    <div class="col-12 col-sm-2 mb-3 ">
                        <a href="{{ url('/')}}">
                        <img src="{{ config('settings.site_logo') }}" alt="Logo" class="img-fluid tiny-logo">
                        </a>
                    </div>
                    <div class="col-6 col-sm-2 mt-4 mt-sm-0 ">
                        <ul class="d-flex flex-column gap-3 list-unstyled">
                            <li><a href="javascript:void(0)">Share an Itinerary</a></li>
                            <li><a href="javascript:void(0)" class="gap-2">Discover</a></li>
                            <li><a href="javascript:void(0)">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-2 px-2 mb-4 pb-1 mt-4 mt-sm-0">
                        <ul class="d-flex flex-column gap-3 list-unstyled">
                            <li><a href="{{ url('/term-of-use')}}">Terms of Use</a></li>
                            <li><a href="javascript:void(0)" class="gap-2">Contact Us</a></li>
                            <li><a href="{{ url('/privacy-policy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm mt-3 mt-lg-0">
                        <h5 class="fs-16-500">Let's stay in touch</h5>
                        <p class="fs-12-300 black-300">We are working to make things better. You can get notified subscribing below</p>
                        <form method="POST" action="{{route('subscription')}}">
                            @csrf
                            <div class="footer-field d-flex align-items-center">
                                <div class="form-group w-100">
                                    <input type="email" name="email" class="form-control fs-12-300 opacity-75 rounded-pill px-3"
                                        placeholder="Enter your email" required>
                                </div>
                                <button type="submit" class="btn btn-dark fs-16-400 rounded-pill px-4 mx-2">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="footer-bar mt-5">
                        <div class="media-links">
                            <ul class="list-inline w-140">
                                <li class="list-inline-item "><a href="{{ config('settings.facebook') }}"><img src="{{ asset("frontend/images/facebook.png") }}" class="w-24" alt="Facebook"></a>
                                </li>
                                <li class="list-inline-item "><a href="{{ config('settings.twitter') }}"><img src="{{ asset("frontend/images/twitter.png") }}" class="w-24" alt="Twitter"></a>
                                </li>
                                <li class="list-inline-item "><a href="{{ config('settings.instagram') }}"><img src="{{ asset("frontend/images/instagram.png") }}" class="w-24" alt="Instagram"></a></li>
                            </ul>
                        </div>
                        <div class="media-p">
                            <p>{{ date('Y') }} Tinery, Inc. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</footer>
