@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $pageTitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('admin.itinerarylocation.index') }}">Itinerary Locations</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        {{-- <h3 class="card-title">{{ $subTitle }}</h3> --}}
                        <div class="card-tools">
                            <a class="btn btn-success" href="{{ route('admin.itinerarylocation.index') }}">
                                <i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.itinerarylocation.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('address_street', 'Street') !!}
                                    {!! Form::text('address_street', null, ['class' => 'form-control', 'id' => 'address_street_location']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('address_street_line1', 'Street Line 1') !!}
                                    {!! Form::text('address_street_line1', null, ['class' => 'form-control', 'id'=> 'address_street_line1']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('address_city', 'City') !!}
                                    {!! Form::text('address_city', null, ['class' => 'form-control', 'id'=> 'address_city']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('address_state', 'State') !!}
                                    {!! Form::text('address_state', null, ['class' => 'form-control', 'id'=> 'address_state']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('address_zipcode', 'Zipcode') !!}
                                    {!! Form::text('address_zipcode', null, ['class' => 'form-control', 'id'=> 'address_zipcode']) !!}

                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('address_country', 'Country') !!}
                                    {!! Form::text('address_country', null, ['class' => 'form-control', 'id'=> 'address_country']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('latitude', 'Latitude') !!}
                                    {!! Form::text('latitude', null, ['class' => 'form-control', 'id'=> 'latitude']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('longitude', 'Longitude') !!}
                                    {!! Form::text('longitude', null, ['class' => 'form-control', 'id'=> 'longitude']) !!}
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>

                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @include('admin.partials.scripts')
    @include('admin.itineraries.itineraryscript')

    <script>
        $(document).ready(function() {

            // Add click event to accordion header buttons
            $('.card-header button').click(function(e) {
                // Toggle the right-side icon
                e.preventDefault();
                $(this).find('i').toggleClass('fa-angle-right fa-angle-down');
            });


        });

        var special = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth',
            'eleventh', 'twelfth', 'thirteenth', 'fourteenth', 'fifteenth', 'sixteenth', 'seventeenth', 'eighteenth',
            'nineteenth'
        ];
        var deca = ['twent', 'thirt', 'fort', 'fift', 'sixt', 'sevent', 'eight', 'ninet'];

        function stringifyNumber(n) {
            if (n < 20) return special[n];
            if (n % 10 === 0) return deca[Math.floor(n / 10) - 2] + 'ieth';
            return deca[Math.floor(n / 10) - 2] + 'y-' + special[n % 10];
        }

        // TEST LOOP SHOWING RESULTS
        // for (var i=0; i<100; i++)
        // console.log(stringifyNumber(3));

        $(document).on("click", ".add-activity-day", function(e) {
            e.preventDefault();
            var card_data = $("#faq #card1").clone();
            $(card_data).removeAttr('id');
            card_data.find('.remove-btn').removeClass('d-none');
            $("#faq").append(card_data);
        })

        $(document).on("click", ".btn-danger.remove-btn", function(e) {
            e.preventDefault();
            $(this).parent('.card').remove();

        })

        $(document).on("click", ".add-activitybtn", function(e) {
            e.preventDefault();
            var clone_box = $(this).closest('.activities-body .activities-box').clone();
            var cloned = $(this).closest(".card-body.activities-body").appendTo(clone_box);
            console.log(clone_box);

        })
    </script>

    @php
        $key = env('GOOGLE_MAP_API_KEY');
    @endphp
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ $key }}"></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key={{ $key }}"></script>

    <script>
        $(document).ready(function() {
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
            initMaps();

            var apiKey = `{{ $key }}`;


            var options = {
                    types: ['(cities)']
                };

            var autocomplete = new google.maps.places.Autocomplete($("#address_street_location")[0], options);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var result = autocomplete.getPlace();
                console.log(result.address_components[0]);

                var location = result.geometry.location;
                var addressComponents = result.address_components;

                var latitude = location.lat;
                var longitude = location.lng;

                var address_street_line1 = result.formatted_address;
                var city = getAddressComponent(addressComponents, 'locality');
                var state = getAddressComponent(addressComponents, 'administrative_area_level_1');
                alert(state);
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



            function getAddressComponent(components, type) {
                for (var i = 0; i < components.length; i++) {
                    var component = components[i];
                    var componentTypes = component.types;
                    // console.log(component.types);
                    if(component.types[0] == "administrative_area_level_1"){
                        return component.short_name;
                    }
                    else if (componentTypes.indexOf(type) !== -1) {
                        return component.long_name;
                    }
                }
                return '';
            }
        });
    </script>

    <script>
        function addRow() {
            const div = document.createElement('div');

            div.className = 'row';

            div.innerHTML = `
			<div class="col-lg-12 mt-2 form-group">
                <label>Activity Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-lg-11">
                <h4>Create Activity</h4>
            </div>
            <div class="col-lg-1">
                <input type="button" class="btn btn-primary text-white" value="+" onclick="addRow1()">
            </div>
			<input type="button" class="btn" style="height:35px;width:35px;margin-left:10px;margin-bottom:20px;background-color:#fd3550;color:white;" value="X" onclick="removeRow(this)" />
			`;

            document.getElementById('content').appendChild(div);
        }

        function removeRow(input) {
            document.getElementById('content').removeChild(input.parentNode);
        }

        function addRow1() {
            const div = document.createElement('div');

            div.className = 'row';

            div.innerHTML = `
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 mt-2 form-group">
                        <label>Activity Time</label>
                        <input type="time" class="form-control">
                    </div>
                    <div class="col-lg-6 mt-2 form-group">
                        <label>Activity Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-lg-12 mt-2 form-group">
                        <label>Activity Detail</label>
                        <textarea name="details" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
			<input type="button" class="btn" style="height:35px;width:35px;margin-left:15px;margin-top:30px;background-color:#fd3550;color:white;" value="X" onclick="removeRow1(this)" />
			`;

            document.getElementById('content1').appendChild(div);
        }

        function removeRow1(input) {
            document.getElementById('content1').removeChild(input.parentNode);
        }
    </script>
