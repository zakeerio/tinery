<footer class="footer py-4  ">
    <div class="container">
        <div class="row mt-5 px-4">
            <div class="cool-12 col-sm-2 mb-3 ">
                <a href="{{ url('/')}}">
                <img src="{{ asset("frontend/images/LOGO.png") }}" alt="Logo" class="img-fluid tiny-logo">
                </a>
            </div>
            <div class="col-6 col-sm-2 mt-4 pt1 ">
                <ul class="d-flex flex-column gap-3 list-unstyled">
                    <li><a href="#">Share an Itinerary</a></li>
                    <li><a href="#" class="gap-2">Discover</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="col-6 col-sm-2 px-2 mb-4 pb-1">
                <ul class="d-flex flex-column gap-3 list-unstyled">
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#" class="gap-2">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm mt-3">
                <h5>Let's stay in touch</h5>
                <p>We are working to make things better. You can get notified subscribing below</p>
                <form>
                    <div class="footer-field d-flex align-items-center">
                        <div class="form-group w-100">
                            <input type="email" class="form-control rounded-pill px-3"
                                placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-dark join rounded-pill px-4 mx-2">Submit</button>
                    </div>
                </form>
            </div>
            <div class="footer-bar mt-5">
                <div class="media-links">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><img src="{{ asset("frontend/images/facebook.png") }}" alt="Facebook"></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><img src="{{ asset("frontend/images/twitter.png") }}" alt="Twitter"></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><img src="{{ asset("frontend/images/instagram.png") }}" alt="Instagram"></a></li>
                    </ul>
                </div>
                <div class="media-p">
                    <p>{{ date('Y') }} Tinery, Inc. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
