
{{-- Plugins --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
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
@php
$key = env('GOOGLE_MAP_API_KEY');
@endphp
{{-- scripts --}}
<script src="{{asset('js/admin/js/adminlte.js')}}"></script>
<script src="{{asset('js/admin/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@php
    $key = env('GOOGLE_MAP_API_KEY');
@endphp
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key={{ $key }}"></script>

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
    $(document).ready(function() {


        if($('#map').length > 0) {

            initMaps();

            // var options = {
            //             types: ['(cities)']
            //         };

            // var autocomplete = new google.maps.places.Autocomplete($("#address_street")[0], options);

            // google.maps.event.addListener(autocomplete, 'place_changed', function() {
            //     var result = autocomplete.getPlace();
            //     console.log(result.address_components[0]);

            //     var location = result.geometry.location;
            //     var addressComponents = result.address_components;

            //     var latitude = location.lat;
            //     var longitude = location.lng;

            //     var address_street_line1 = result.formatted_address;
            //     var city = getAddressComponent(addressComponents, 'locality');
            //     var state = getAddressComponent(addressComponents, 'administrative_area_level_1');
            //     var country = getAddressComponent(addressComponents, 'country');
            //     var postalCode = getAddressComponent(addressComponents, 'postal_code');


            //     // Update form fields with retrieved values

            //     $('#address_street_line1').val(address_street_line1);
            //     $('#address_zipcode').val(postalCode);

            //     $('#latitude').val(latitude);
            //     $('#longitude').val(longitude);
            //     $('#address_city').val(city);
            //     $('#address_state').val(state);
            //     $('#address_country').val(country);
            // });
        }

        function  initMaps(){

            // execute
            var locations = [
                {
                    'description': '<b>Name 1</b><br>Address Line 1<br>Bismarck, ND 58501<br>Phone: 701-555-1234<br><a href="#" >Link<a> of some sort.',
                    'lat': 46.8133,
                    'long': -100.7790,
                },
                {
                    'description' : '<b>Name 2</b><br>Address Line 1<br>Fargo, ND 58103<br>Phone: 701-555-4321<br><a href="#" target="_blank">Link<a> of some sort.',
                    'lat' : 46.8772,
                    'long' : -96.7894,
                }
            ];

            console.log(locations)

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                /* Zoom level of your map */
                center: new google.maps.LatLng(47.47021625, -100.47173475),
                /* coordinates for the center of your map */
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            locations.forEach(function(location) {
                // Accessing individual properties
                var description = location.description;
                var lat = location.lat;
                var long = location.long;

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, long),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(description);
                        infowindow.open(map, marker);
                    }
                })(marker, i));

                // Perform actions with the location data
                // console.log('Description:', description);
                // console.log('Latitude:', lat);
                // console.log('Longitude:', long);
            })

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
    $(document).ready(function(){
        $('.select2').select2();
        $(document).on('click','a[data-role=addtowishlist]',function(){
            var id = $(this).data('id');
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url:'{{ url("/favourites")}}',
                method:'post',
                data:{_token:csrftoken,id:id},
                success:function(data)
                {
                    var res = $.parseJSON(data);
                    if(res.success)
                    {
                        $.notify({
                        title: '<strong>SUCCESS!</strong>',
                        message: res.success
                        },{
                        type: 'success'
                        });
                    }
                    if(res.error)
                    {
                        $.notify({
                        title: '<strong>ERROR!</strong>',
                        message: res.error
                        },{
                        type: 'danger'
                        });
                    }
                    setTimeout(function() {
                        window.history.go(0); // Replace with your desired URL
                    }, 500);
                }
            });
        });
        $(document).on('click','a[data-role=removetowishlist]',function(){
            var id = $(this).data('id');
            var csrftoken = $('#csrftoken').val();

            $.ajax({
                url:'{{ url("/removefavourites")}}',
                method:'post',
                data:{_token:csrftoken,id:id},
                success:function(data)
                {
                    var res = $.parseJSON(data);
                    if(res.success)
                    {
                        $.notify({
                        title: '<strong>SUCCESS!</strong>',
                        message: res.success
                        },{
                        type: 'success'
                        });
                    }

                    setTimeout(function() {
                        window.history.go(0); // Replace with your desired URL
                    }, 500);
                }
            });
        });
        $(document).on('click','a[data-role=addtowishlistnotlogin]',function(){
            $.notify({
            title: '<strong>ERROR!</strong>',
            message: 'Login to add your Favourites'
            },{
            type: 'danger'
            });
        });
    });
</script>
<<<<<<< HEAD
<script>
    $(document).ready(function(){
        function showdaysactivities(itineraryid,daysid)
        {
            var csrftoken = $('#csrftoken').val();
            $.ajax({
                url:'{{ url("/showdaysactivities")}}',
                method:'post',
                data:{_token:csrftoken,itineraryid:itineraryid,daysid:daysid},
                success:function(data)
                {
                    alert(data);
                    $("#showitinerariesdaysactivities").html(data);
                }
            });
        }
        $(document).on('click','a[data-role=btnaddactivity]',function(){
            var itineraryid = $(this).data('itineraryid');
            var daysid = $(this).data('daysid');
            var csrftoken = $('#csrftoken').val();
            alert(daysid);
            
            $.ajax({
                url:'{{ url("/addactivitydb")}}',
                method:'post',
                data:{_token:csrftoken,itineraryid:itineraryid,daysid:daysid},
                success:function(data)
                {
                    showdaysactivities(itineraryid,daysid);
                }
            });
        });
    });
</script>
=======
>>>>>>> a8977e117be767d6464d01d0fafa5b3a7a7d251a
