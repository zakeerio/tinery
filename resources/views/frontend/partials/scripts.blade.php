
{{-- Plugins --}}
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script> --}}

<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>

{{-- scripts --}}
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
{{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

<script src="{{asset('js/admin/js/adminlte.js')}}"></script>
<script src="{{asset('js/admin/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@php
    $key = env('GOOGLE_MAP_API_KEY');
@endphp
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key={{ $key }}"></script>
<script>
    Dropzone.options.myAwesomeDropzone1 = {
        url: "{{ route('single.itinerary.cover.upload') }}",
        acceptedFiles: "image/*",
        maxFiles: 1,
        init: function () {
            this.on("success", function (file, response) {
                var imageUrl = response.url;
                console.log(response);

                var bgimg = document.getElementById("bgimg");
                bgimg.style.backgroundImage = "url(" + imageUrl + ")";
                bgimg.getElementsByClassName("dz-preview")[0].style.display = "none";
                window.history.go(0);
            });

            this.on("addedfile", function () {
                console.log(this.files[0]);
                if (this.files[1] != null) {
                    this.removeFile(this.files[0]);
                }
            });
        }
    };
    Dropzone.options.myAwesomeDropzone2 = {
        url: "{{ route('single.itinerary.gallery.upload') }}",
        acceptedFiles: "image/*",
        init: function () {
            this.on("success", function (file, response) {
                window.history.go(0);
            });
        }
    };
</script>
<input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
@if(Session::has('success'))
    <script>
        $.notify({
        title: '<strong>SUCCESS!</strong>',
        message: '<?= Session::get('success')?>'
        },{
        type: 'success'
        });
    </script>
@endif
@if(Session::has('error'))
    <script>
        $.notify({
        title: '<strong>Error!</strong>',
        message: '<?= Session::get('error')?>'
        },{
        type: 'danger'
        });
    </script>
@endif
<script>

    $(document).ready(function () {
        $('.slickslider').slick({
            slidesToShow: 4,        // Display 4 items at a time
            autoplay: true,         // Enable auto start
            autoplaySpeed: 2000,    // Set autoplay interval in milliseconds (e.g., 2000ms = 2 seconds)
            infinite: true,         // Enable continuous loop
            arrows: false,          // Hide navigation arrows (optional)
            dots: false,              // Show navigation dots (optional)
            responsive: [
                {
                    breakpoint: 490,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },

                },
                {
                    breakpoint: 797,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },

                },
                {
                    breakpoint: 360,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },

                }

            ],
        });
    });
    $(document).ready(function () {
        $('.slickslider6').slick({
            slidesToShow: 6,        // Display 4 items at a time
            autoplay: true,         // Enable auto start
            autoplaySpeed: 2000,    // Set autoplay interval in milliseconds (e.g., 2000ms = 2 seconds)
            infinite: true,         // Enable continuous loop
            arrows: false,          // Hide navigation arrows (optional)
            dots: false,              // Show navigation dots (optional)
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    },

                },

                {
                    breakpoint: 797,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },

                },
                {
                    breakpoint: 490,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },

                },
                {
                    breakpoint: 360,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },

                }

            ],
        });
    });


    $(document).ready(function () {

        $('.dropdown-menu').on('click', function (event) {
            event.stopPropagation();
        });

        $('#intro').on('shown.bs.modal', function () {
            $('.select2').select2({
                dropdownParent: $('#intro') // Specify the modal element as the parent container
            });
        });

        $(".locationModal").on("shown.bs.modal", function() {

            if($(".map_address_field").length > 0 ){
                console.log("map_address_field exist");
                var options = {
                    types: ['(cities)']
                };

                var autocomplete = new google.maps.places.Autocomplete($(".map_address_field")[0], options);

                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    var result = autocomplete.getPlace();
                    console.log(result.address_components[0]);

                    var location = result.geometry.location;
                    var addressComponents = result.address_components;

                    var latitude = location.lat;
                    var longitude = location.lng;

                    var address_street_line1 = result.formatted_address;
                    var city = getAddressComponent(addressComponents, 'locality');
                    var state = getAddressComponent(addressComponents, 'administrative_area_level_1');
                    var country = getAddressComponent(addressComponents, 'country');
                    var postalCode = getAddressComponent(addressComponents, 'postal_code');

                    console.log(address_street_line1+" "+city+" "+state+" "+country+" "+postalCode);


                    // Update form fields with retrieved values

                    // $('#address_street_line1').val(address_street_line1);
                    // $('#address_zipcode').val(postalCode);

                    // $('#latitude').val(latitude);
                    // $('#longitude').val(longitude);
                    // $('#address_city').val(city);
                    // $('#address_state').val(state);
                    // $('#address_country').val(country);
                });
            }
        });

        if ($('#address_street').length > 0) {

            var options = {
                types: ['(cities)']
            };

            var autocomplete = new google.maps.places.Autocomplete($("#address_street")[0], options);

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var result = autocomplete.getPlace();
                console.log(result.address_components[0]);

                var location = result.geometry.location;
                var addressComponents = result.address_components;

                var latitude = location.lat;
                var longitude = location.lng;

                var address_street_line1 = result.formatted_address;
                var city = getAddressComponent(addressComponents, 'locality');
                var state = getAddressComponent(addressComponents, 'administrative_area_level_1');
                var country = getAddressComponent(addressComponents, 'country');
                var postalCode = getAddressComponent(addressComponents, 'postal_code');


                // Update form fields with retrieved values

                $('#address_street_line1').val(address_street_line1);
                $('#address_zipcode').val(postalCode);

                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
                $('#address_city').val(city);
                $('#address_state').val(state);
                $('#address_country').val(country);
            });
        }

        function getAddressComponent(components, type) {
            for (var i = 0; i < components.length; i++) {
                var component = components[i];
                var componentTypes = component.types;

                if (componentTypes.indexOf(type) !== -1) {
                    return component.long_name;
                }
            }
            return '';
        }
    });
    $(document).ready(function () {
        $(document).on('click', 'a[data-role=clicktoforgot]', function () {
            $("#forgotpasswordform").show();
            $("#loginform").hide();
        });
        $(document).on('click', 'a[data-role=clicktologin]', function () {
            $("#forgotpasswordform").hide();
            $("#loginform").show();
        });

        $(document).on('click', 'a[data-role=clicktoforgotloginpage]', function () {
            $(".forgotpasswordform").show();
            $(".loginform").hide();
        });
        $(document).on('click', 'a[data-role=clicktologinpage]', function () {
            $(".forgotpasswordform").hide();
            $(".loginform").show();
        });


        $(document).on('click', 'a[data-role=sendforgotpasswordcode]', function () {
            var csrftoken = $('#csrftoken').val();
            var email = $(".forgotpasswordemail").val();

            if (email == "") {
                alert('Email Address is not Empty');
            }
            else {
                $.ajax({
                    url: '{{ url("/forgotpasswordcode")}}',
                    method: 'post',
                    data: { _token: csrftoken, email: email },
                    success: function (data) {
                        var res = $.parseJSON(data);
                        if (res.error) {
                            alert('Email Address is not Found');
                        }
                        if (res.success) {
                            $(".forgotpasswordalertsuccess").show();
                        }
                    }
                });
            }
        });
        $('.select2').select2();
        $(document).on('click', 'a[data-role=addtowishlist]', function () {
            var id = $(this).data('id');
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url: '{{ url("/favourites")}}',
                method: 'post',
                data: { _token: csrftoken, id: id },
                success: function (data) {
                    var res = $.parseJSON(data);
                    if (res.success) {
                        $.notify({
                            title: '<strong>SUCCESS!</strong>',
                            message: res.success
                        }, {
                            type: 'success'
                        });
                    }
                    if (res.error) {
                        $.notify({
                            title: '<strong>ERROR!</strong>',
                            message: res.error
                        }, {
                            type: 'danger'
                        });
                    }
                    setTimeout(function () {
                        window.history.go(0); // Replace with your desired URL
                    }, 500);
                }
            });
        });
        $(document).on('click', 'a[data-role=removetowishlist]', function () {
            var id = $(this).data('id');
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url: '{{ url("/removefavourites")}}',
                method: 'post',
                data: { _token: csrftoken, id: id },
                success: function (data) {
                    var res = $.parseJSON(data);
                    if (res.success) {
                        $.notify({
                            title: '<strong>SUCCESS!</strong>',
                            message: res.success
                        }, {
                            type: 'success'
                        });
                    }

                    setTimeout(function () {
                        window.history.go(0); // Replace with your desired URL
                    }, 500);
                }
            });
        });
        $(document).on('click', 'a[data-role=addtowishlistnotlogin]', function () {
            $.notify({
                title: '<strong>ERROR!</strong>',
                message: 'Login to add your Favourites'
            }, {
                type: 'danger'
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        function showdaysactivities(itineraryid, daysid) {
            var csrftoken = $('#csrftoken').val();
            $.ajax({
                url: '{{ url("/showdaysactivities")}}',
                method: 'post',
                data: { _token: csrftoken, itineraryid: itineraryid, daysid: daysid },
                success: function (data) {
                    $("#showitinerariesdaysactivities" + daysid).html(data);
                }
            });
        }
        $(document).on('click', 'button[data-role=btnshowactivitymodel]', function () {
            var itineraryid = $(this).data('itineraryid');
            var daysid = $(this).data('daysid');
            var csrftoken = $('#csrftoken').val();
            $.ajax({
                url: '{{ url("/showdaysactivities")}}',
                method: 'post',
                data: { _token: csrftoken, itineraryid: itineraryid, daysid: daysid },
                success: function (data) {
                    $("#showitinerariesdaysactivities" + daysid).html(data);
                }
            });
        });
        $(document).on('click', 'a[data-role=btnaddactivity]', function () {
            var itineraryid = $(this).data('itineraryid');
            var daysid = $(this).data('daysid');
            var dataID = $(this).data('id');
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url: '{{ url("/addactivitydb")}}',
                method: 'post',
                data: { _token: csrftoken, itineraryid: itineraryid, daysid: daysid },
                success: function (data) {
                    showdaysactivities(itineraryid, daysid);
                }
            });
        });
        $('#signupForm').on('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Clear previous error messages
            $('.invalid-feedback-registeration').empty();

            // Perform client-side validation
            var firstname = $('.regfirstname').val();
            var email = $('.regemail').val();
            var password = $('.regpassword').val();
            var lastname = $('.reglastname').val();
            var username = $('.regusername').val();
            var confirm_password = $('.regconfirm_password').val();

            if (!firstname) {
                $('#regnameError').text('Name is required.');
                $(".regfirstname").focus();
                return;
            }

            if (!email) {
                $('#regemailError').text('Email is required.');
                $(".regemail").focus();
                return;
            }

            if (!password) {
                $('#regpassError').text('Password is required.');
                $(".regpassword").focus();
                return;
            }

            if (password.length < 8) {
                $('#regpassError').text('Password must be at least 8 characters long.');
                return;
            }

            if (!lastname) {
                $('#reglastnameError').text('last Name is required.');
                $(".reglastname").focus();
                return;
            }

            if (!username) {
                $('#regusernameError').text('Username is required.');
                $(".regusername").focus();
                return;
            }

            if (!confirm_password) {
                $('#regconpassError').text('Confirm Password is required.');
                $(".regconfirm_password").focus();
                return;
            }

            if (confirm_password.length < 8) {
                $('#regconpassError').text('Confirm Password must be at least 8 characters long.');
                return;
            }

            if (password != confirm_password) {
                $('#regconpassError').text('Password and Confirm Password must be same.');
                return;
            }
            // If validation passes, submit the form
            this.submit();
        });

        $(".regemail").blur(function(){
            var email = $(this).val();
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url:'{{ url("/registeremailexistance")}}',
                method:'post',
                data:{_token:csrftoken,email:email},
                success:function(data)
                {
                    $('#regemailSuccess').text('');
                    $('#regemailError').text('');
                    if(data == 'success')
                    {
                        $('#regemailSuccess').text('Email is available.');
                    }
                    if(data == 'error')
                    {
                        $('#regemailError').text('Email is already exist.');
                        $(".regemail").focus();
                    }
                }
            });
        });

        $(".loginemail").blur(function(){
            var email = $(this).val();
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url:'{{ url("/loginemailexistance")}}',
                method:'post',
                data:{_token:csrftoken,email:email},
                success:function(data)
                {
                    $('#loginemailSuccess').text('');
                    $('#loginemailError').text('');
                    if(data == 'success')
                    {
                        $('#loginemailSuccess').text('Valid Email.');
                    }
                    if(data == 'error')
                    {
                        $('#loginemailError').text('Invalid Email Address.');
                        $(".loginemail").focus();
                    }
                }
            });
        });

        $(".loginpassword").blur(function(){
            var email = $('.loginemail').val();
            var pass = $(this).val();
            if (!email) {
                $('#loginemailError').text('Email is required.');
                $(".loginemail").focus();
                return;
            }
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url:'{{ url("/loginpasswordcheck")}}',
                method:'post',
                data:{_token:csrftoken,email:email,pass:pass},
                success:function(data)
                {
                    $('#loginpassSuccess').text('');
                    $('#loginpassError').text('');
                    if(data == 'success')
                    {
                        $('#loginpassSuccess').text('Login Now.');
                        this.submit();
                    }
                    if(data == 'error')
                    {
                        $('#loginpassError').text('Invalid Password.');
                        // $(".loginpassword").focus();
                    }
                }
            });
        });
    });
</script>
