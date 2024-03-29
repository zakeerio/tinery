
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
        type: 'success',
        placement: {
            // from: "center",  // Place the notification in the center
            align: "center"  // Align the notification content to the center
        }
        });
    </script>
@endif
@if(Session::has('error'))
    <script>
        $.notify({
            title: '<strong>Error!</strong>',
            message: '<?= Session::get('error')?>'
        },{
            type: 'danger',
            placement: {
                // from: "center",  // Place the notification in the center
                align: "center"  // Align the notification content to the center
            }
        });
    </script>
@endif
<script>

    $(document).ready(function () {
        $('#profileimg').on('change', function() {
            // Get the selected file
            var csrftoken = $('#csrftoken').val();

            var file = this.files[0];
            var imageTypes = ['image/jpeg', 'image/png', 'image/gif']; // Add other image formats as needed
            if (imageTypes.indexOf(file.type) === -1) {
                alert('Please select a valid image file (JPEG, PNG, GIF).');
                return;
            }

            // Check if the file size is within the allowed limit (optional)
            var maxSize = 1024 * 1024; // 1 MB (adjust the value as per your requirements)
            if (file.size > maxSize) {
                alert('The selected image exceeds the allowed size limit.');
                return;
            }
            // Show the selected file's name (optional)
            // You can display the file name somewhere on the page to let the user know the selected file.
            var fileName = file.name;
            console.log('Selected file: ' + fileName);

            // Create a FormData object to send the file to the server
            var formData = new FormData();
            formData.append('file', file);
            formData.append('_token', csrftoken);

            // Use AJAX to submit the form without page refresh
            $.ajax({
                url: '{{ route('profilepictureupdate') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    window.location.href = "/profile";
                },
                error: function(error) {
                    console.error(error); // Handle any errors that occur during the upload.
                }
            });
        });
        $('.slickslider').slick({
            slidesToShow: 4,        // Display 4 items at a time
            autoplay: true,         // Enable auto start
            autoplaySpeed: 2000,    // Set autoplay interval in milliseconds (e.g., 2000ms = 2 seconds)
            infinite: true,         // Enable continuous loop
            arrows: false,          // Hide navigation arrows (optional)
            dots: false,              // Show navigation dots (optional)
            responsive: [
                {
                    breakpoint: 577,
                    settings: {
                        slidesToShow: 2,

                    },

                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 3,

                    },

                },
                {
                    breakpoint: 360,
                    settings: {
                        slidesToShow: 1,

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

        $(".deleteItinerary").on('click', function(e){
            e.preventDefault();
            var csrftoken = $('#csrftoken').val();
            var confirmval =  confirm('Are you sure you want to delete this itinerary?');
            var id = $(this).data("id");
            var itineraryItem = $(this).closest(".itineraryItem");
            var postlink = $(this).data("href");
            if(confirmval == false){
                return false;
            } else {
                $.ajax({
                    url: postlink,
                    method: 'post',
                    data: { _token: csrftoken, id: id },
                    success: function (data) {
                        var res = $.parseJSON(data);
                        if (res.success) {
                            condition_true = true;

                            var notification = $.notify({
                                title: '<strong>SUCCESS!</strong>',
                                message: res.success
                            }, {
                                type: 'success',
                                placement: {
                                    // from: "center",  // Place the notification in the center
                                    align: "center"  // Align the notification content to the center
                                }
                            });
                        }

                        setTimeout(function () {
                            itineraryItem.remove();
                            notification.close()
                            // window.history.go(0); // Replace with your desired URL
                        }, 500);
                    }
                });
            }
        })

        function locationModelLoad(){
            // $(".locationModal").on("shown.bs.modal", function() {
                if($(this).find(".map_address_field").length > 0 ){

                    console.log($(this).find(".map_address_field").length);

                    console.log("map_address_field exist");
                    var options = {
                        types: ['(cities)']
                    };

                    $(this).find(".map_address_field").each(function(current){

                        var autocomplete = new google.maps.places.Autocomplete($(current)[0], options);

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

                    })
                }
            // });
        }



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
            var currentElement = this;
            var id = $(this).data('id');
            var csrftoken = $('#csrftoken').val();
            var img_source =  $(this).data("source");
            var single_img_path = `{{ asset('frontend/images/heart-red.svg') }}`;
            var general_img_path = `{{ asset('frontend/images/border-heart.svg') }}`;
            var added_img_path = '';
            if(img_source) {
                added_img_path = single_img_path;
            } else {
                added_img_path = general_img_path;
            }
            var condition_true = false;


            $.ajax({
                url: '{{ url("/favourites")}}',
                method: 'post',
                data: { _token: csrftoken, id: id },
                success: function (data) {
                    var res = $.parseJSON(data);
                    if (res.success) {
                        condition_true = true;

                        var notification = $.notify({
                            title: '<strong>SUCCESS!</strong>',
                            message: res.success
                        }, {
                            type: 'success',
                            placement: {
                                // from: "center",  // Place the notification in the center
                                align: "center"  // Align the notification content to the center
                            }
                        });
                    }
                    if (res.error) {
                        var notification = $.notify({
                            title: '<strong>ERROR!</strong>',
                            message: res.error
                        }, {
                            type: 'danger',
                            placement: {
                                // from: "center",  // Place the notification in the center
                                align: "center"  // Align the notification content to the center
                            }
                        });
                    }
                    if(condition_true){
                        $(currentElement).find('img').attr('src', added_img_path);
                        $(currentElement).attr('data-role', 'removetowishlist');
                    }
                    setTimeout(function () {
                        notification.close();
                        // window.history.go(0); // Replace with your desired URL
                    }, 500);
                }
            });


        });
        $(document).on('click', 'a[data-role=removetowishlist]', function () {
            var currentElement = this;
            var id = $(this).data('id');
            var csrftoken = $('#csrftoken').val();
            var img_source =  $(this).data("source");
            var single_img_path = `{{ asset('frontend/images/border-heart.svg') }}`;
            var general_img_path = `{{ asset('frontend/images/Path.png') }}`;
            var added_img_path = '';
            if(img_source) {
                added_img_path = single_img_path;
            } else {
                added_img_path = general_img_path;
            }

            var condition_true = false;

            $.ajax({
                url: '{{ url("/removefavourites")}}',
                method: 'post',
                data: { _token: csrftoken, id: id },
                success: function (data) {
                    var res = $.parseJSON(data);
                    if (res.success) {
                        condition_true = true;

                        var notification = $.notify({
                            title: '<strong>SUCCESS!</strong>',
                            message: res.success
                        }, {
                            type: 'success',
                            placement: {
                                // from: "center",  // Place the notification in the center
                                align: "center"  // Align the notification content to the center
                            }
                        });
                    }

                    if(condition_true){
                        $(currentElement).find('img').attr('src', added_img_path);
                        $(currentElement).attr('data-role', 'addtowishlist');
                    }

                    setTimeout(function () {
                        notification.close()
                        // window.history.go(0); // Replace with your desired URL
                    }, 500);
                }
            });

        });
        $(document).on('click', 'a[data-role=addtowishlistnotlogin]', function () {
            var notification = $.notify({
                title: '<strong>ERROR!</strong>',
                message: 'Login to add your Favourites'
            }, {
                type: 'danger',
                placement: {
                    // from: "center",  // Place the notification in the center
                    align: "center"  // Align the notification content to the center
                }
            });

            setTimeout(function () {
                notification.close()
            }, 1000);
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
        function isValidEmail(email) {
            // Regular expression pattern for basic email validation
            const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return pattern.test(email);
        }
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
            var csrftoken = $('#csrftoken').val();

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
            // this.submit();

            $.ajax({
                url:'{{ url("/register_custom")}}',
                method:'post',
                data:{_token:csrftoken,firstname:firstname,email:email,password:password,lastname:lastname,username:username,confirm_password:confirm_password},
                success:function(data)
                {
                    $('.regalertdanger').html('');
                    if(data == 'erroremail')
                    {
                        $('.regalertdangerdiv').show();
                        $('.regalertdanger').text('Email is not valid.');
                    }
                    if(data == 'errorusername')
                    {
                        $('.regalertdangerdiv').show();
                        $('.regalertdanger').text('Username is not valid.');
                    }
                    if(data == 'registrationfailed')
                    {
                        $('.regalertdangerdiv').show();
                        $('.regalertdanger').text('Registration Failed');
                    }
                    if(data == 'success')
                    {
                        $('#done-page').modal('toggle');
                    }
                }
            });
        });

        $(".regemail").keyup(function(){
            var email = $(this).val();
            var csrftoken = $('#csrftoken').val();

            if(email != '' && isValidEmail(email))
            {
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
            }
            else
            {
                $("#regemailError").text("Please enter a valid Email.");
            }
        });

        $(".regusername").keyup(function(){
            var username = $(this).val();
            var csrftoken = $('#csrftoken').val();

            if(username != '')
            {
                $.ajax({
                    url:'{{ url("/registerusernameexistance")}}',
                    method:'post',
                    data:{_token:csrftoken,username:username},
                    success:function(data)
                    {
                        $('#regusernameSuccess').text('');
                        $('#regusernameError').text('');
                        if(data == 'success')
                        {
                            $('#regusernameSuccess').text('username is available.');
                        }
                        if(data == 'error')
                        {
                            $('#regusernameError').text('username is already exist.');
                            $(".regusername").focus();
                        }
                    }
                });
            }
        });

        $(".loginemail").keyup(function(){
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
                        $('.loginbtnforuser').prop('disabled', true);
                        $(".loginemail").focus();
                    }
                }
            });
        });

        $(".loginpassword").keyup(function(){
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
                        $('.loginbtnforuser').prop('disabled', false);
                        // this.submit();
                    }
                    if(data == 'error')
                    {
                        $('#loginpassError').text('Invalid Password.');
                        $('.loginbtnforuser').prop('disabled', true);
                        // $(".loginpassword").focus();
                    }
                }
            });
        });
    });
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
