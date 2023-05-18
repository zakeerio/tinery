<footer class="footer py-4 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 ">
                <img src="{{ asset("frontend/images/LOGO.png") }}" alt="Logo" class="img-fluid tiny-logo">
            </div>
            <div class="col-lg-2 col-sm-6">
                <ul class="list-unstyled">
                    <li><a href="#">Share an Itinerary</a></li>
                    <li><a href="#" class="gap-2">Discover</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-6 px-2">
                <ul class="list-unstyled">
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#" class="gap-2">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-6 touch">
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
<div class="modal fade" id="userregistration" tabindex="-1" role="dialog" aria-labelledby="userregistrationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="form-section mt-5">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <form action="{{ route('register_custom')}}" method="POST">
                            @csrf
                                <h2 class="mb-3">Become a Member</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="labe-section">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control rounded-pill" name="firstname" id="name"
                                                    placeholder="Enter your name" required>
                                                <label for="name">FirstName</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control rounded-pill" name="email" id="email"
                                                    placeholder="Enter your email" required>
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control rounded-pill" name="password" id="password"
                                                    placeholder="Enter your password" required>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="labe-section w-100">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control w-100 rounded-pill" name="lastname" id="name"
                                                    placeholder="Enter your name">
                                                <label for="name">LastName</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control w-100 rounded-pill" name="username" id="text"
                                                    placeholder="Username">
                                                <label for="text">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control w-100 rounded-pill" name="password_confirmation" id="password"
                                                    placeholder="Enter your password">
                                                <label for="password">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary become-btn"> Become a Member </butt>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="userloginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="form-section mt-5">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <form action="{{ route('login_new')}}" method="POST">
                            @csrf
                                <h2 class="mb-3">Member Login</h2>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="labe-section">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control rounded-pill" name="email" id="email"
                                                    placeholder="Enter your email" required>
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control rounded-pill" name="password" id="password"
                                                    placeholder="Enter your password" required>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary become-btn"> Login </butt>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>