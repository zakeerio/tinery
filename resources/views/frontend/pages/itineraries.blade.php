@extends('frontend.layouts.app')

@section('content')

    <div class="perfect py-md-5 py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 px-0">
                    <div class="perfect-item ">
                        <h3 class="travel">Find the Perfect Travel Itinerary</h3>
                        <p class="filters-p">Filter by location, trip length, tag or user. Don’t see your location? New
                            itineraries are added by users everyday - or take it upon yourself to write the first one!
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="filter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 px-0">
                    <div class="filter-body">
                        <form action="#" method="POST"
                            class="d-flex justify-content-between align-items-center w-100  " id="filteForm">

                            <div class="d-flex flex-wrap filter-bordr gap-3">

                                <div class=" d-flex gap-2 align-items-center flex-shrink-0">
                                    <div class="filter-logo">
                                        @csrf
                                        <img src="{{ asset('frontend/images/Filter.png') }}" alt=""
                                            class="filter-logo-img">
                                        <span class="fs-24-600">Filter</span>

                                    </div>
                                    <div class="vr mx-32"></div>
                                </div>

                                <!-- Filter dropdown -->

                                <div class="">
                                    <div class="dropdown ">
                                        <button class="btn btn-dark-r dropdown-toggle px-3 pt-2 active" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Location
                                        </button>

                                        <div class="dropdown-menu scroller-white s_h-300px  p-4"
                                            aria-labelledby="dropdownMenuButton1">
                                            <div id="selected-feild"
                                                class="selected-feild d-flex gap-1 flex-wrap align-items-center">
                                                @if (isset($filteredlocations) && !empty($filteredlocations))
                                                    @foreach ($filteredlocations as $filteredlocations)
                                                        <label
                                                            for="optionaddr{{ $filteredlocations->itinerarylocations->address_city }}"
                                                            class="btn btn-light rounded-pill gap-2 text-white d-flex justify-content-between align-items-center">
                                                            @if($filteredlocations->itinerarylocations->address_country == 'United States')
                                                            {{ $filteredlocations->itinerarylocations->address_city }}, 
                                                            {{ $filteredlocations->itinerarylocations->address_state }}, 
                                                            {{ $filteredlocations->itinerarylocations->address_country }}
                                                            @else
                                                            {{ $filteredlocations->itinerarylocations->address_city }}, 
                                                            {{ $filteredlocations->itinerarylocations->address_country }}
                                                            @endif
                                                            <span>X</span>
                                                        </label>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="d-flex py-3">
                                                <input type="search" id="my-input" name="my-input"
                                                    placeholder=" Locations"
                                                    class="locator fs-16-300 rounded-pill px-2 mx-2 ">
                                                <button class="btn btn-secondary w-50 rounded-pill  text-white submitBtn"
                                                    type="button">Go</button>
                                            </div>

                                            <?php $count = 1; ?>
                                            @if (!empty($filter))
                                                @foreach ($filter as $filteritem)
                                                    @if ($filteritem->location_id != '0' && $filteritem->itinerarylocations)
                                                        <div class="row py-2">
                                                            <div class="col-lg-12">
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="location[]"
                                                                        class="form-check-input filter"
                                                                        value="{{ $filteritem->location_id }}"
                                                                        id="optionaddr{{ $filteritem->itinerarylocations->address_city }}"
                                                                        {{ isset($locationfilter) && in_array($filteritem->location_id, $locationfilter) ? 'checked' : '' }}>
                                                                    <label
                                                                        for="optionaddr{{ $filteritem->itinerarylocations->address_city }}"
                                                                        class="form-check-label fs-16-400">
                                                                        @if($filteritem->itinerarylocations->address_country == 'United States')
                                                                        {{ $filteritem->itinerarylocations->address_city }}, 
                                                                        {{ $filteritem->itinerarylocations->address_state }}, 
                                                                        {{ $filteritem->itinerarylocations->address_country }}
                                                                        @else
                                                                        {{ $filteritem->itinerarylocations->address_city }}, 
                                                                        {{ $filteritem->itinerarylocations->address_country }}
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <?php $count++; ?>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class=" ">
                                    <div class="dropdown">
                                        <button class="btn btn-dark-r filter dropdown-toggle px-3 pt-2" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Tags
                                        </button>

                                        <div class="dropdown-menu scroller-white s_h-300px p-4"
                                            aria-labelledby="dropdownMenuButton1">
                                            <div id="selected-feild"
                                                class="selected-feild d-flex gap-1 flex-wrap align-items-center">

                                                <hr>
                                            </div>
                                            <div class="d-flex py-3">

                                                <input type="search" id="my-input" name="tags-input" placeholder=" Tags"
                                                    class="locator rounded-pill px-2 mx-2 ">
                                                <button class="btn btn-secondary w-50 rounded-pill text-white submitBtn"
                                                    type="button">Go</button>
                                            </div>
                                            <?php $count1 = 1; ?>

                                            @if (!empty($tags))
                                                @foreach ($tags as $singletag)
                                                    @if ($singletag)
                                                        <div class="row py-2">
                                                            <div class="col-lg-12">
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="tags[]"
                                                                        class="form-check-input filter"
                                                                        value="{{ $singletag->id }}"
                                                                        id="optiontag{{ $count1 }}"
                                                                        {{ isset($tagsfilter) && in_array($singletag->id, $tagsfilter) ? 'checked' : '' }}>
                                                                    <label for="optiontag{{ $count1 }}"
                                                                        class="form-check-label">{{ $singletag->name }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php $count1++; ?>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class=" ">
                                    <div class="dropdown">
                                        <button class="btn btn-dark-r dropdown-toggle px-3 pt-2" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> User
                                        </button>

                                        <div class="dropdown-menu scroller-white s_h-300px p-4"
                                            aria-labelledby="dropdownMenuButton1">
                                            <div id="selected-feild"
                                                class="selected-feild d-flex gap-1 flex-wrap align-items-center">
                                                @if (isset($filteredusers) && !empty($filteredusers))
                                                    @foreach ($filteredusers as $filteredusers)
                                                        <label for="optionuser{{ $filteredusers->user->name }}"
                                                            class="btn btn-light rounded-pill gap-2 text-white d-flex justify-content-between align-items-center">{{ $filteredusers->user->name }}
                                                            <span>X</span>
                                                        </label>
                                                    @endforeach
                                                @endif
                                                <hr>
                                            </div>
                                            <div class="d-flex py-3">
                                                <input type="search" id="my-input" name="my-input"
                                                    name="user_search"placeholder=" User"
                                                    class="locator rounded-pill px-2 mx-2">
                                                <button class="btn btn-secondary w-50 rounded-pill  text-white submitBtn"
                                                    type="button">Go</button>
                                            </div>
                                            <?php $count2 = 1; ?>
                                            @if (!empty($user_filter))
                                                @foreach ($user_filter as $filter)
                                                    <div class="row py-2">
                                                        <div class="col-lg-12">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input filter"
                                                                    name="users[]" value="{{ $filter->id }}"
                                                                    id="optionuser{{ $filter->name }}"
                                                                    {{ isset($usersfilter) && in_array($filter->id, $usersfilter) ? 'checked' : '' }}>
                                                                <label for="optionuser{{ $filter->name }}"
                                                                    class="form-check-label">{{ $filter->name }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $count2++; ?>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class=" ">
                                    <div class="dropdown ">
                                        <button class="btn btn-dark-r dropdown-toggle px-3 pt-2" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Trip length
                                        </button>

                                        <div class="dropdown-menu  p-4" aria-labelledby="dropdownMenuButton1">
                                            <div id="selected-feild" class="selected-field">
                                                <a href="javascript:;" class="btn clearbtn_range" id="rangslide">
                                                    {{ isset($daysrange) ? '0-' . $daysrange : '0' }} days</a>
                                            </div>
                                            <hr>
                                            <div class="form-rang ">
                                                <div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p>Min</p>
                                                        <p>Max</p>
                                                    </div>
                                                    <!-- <input type="range" id="days" min="5" max="7" step="1"> -->
                                                    {{-- <input type="range" class="form-range" id="days-range" name="daysrange" min="{{$smallestnumber}}" max="{{$largestnumber}}" value="{{ (isset($daysrange)) ? $daysrange : '' }}" step="2"> --}}
                                                    <input type="range" class="form-range" id="days-range"
                                                        name="daysrange" min="0" max="{{ $largestnumber }}"
                                                        value="{{ $largestnumber }}">

                                                </div>
                                                <div>
                                                    <p><button
                                                            class="btn btn-secondary w-50 rounded-pill  bg-dark text-white submitBtn"
                                                            type="button">Go</button></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="selected-feild ps-5">
                                <a href="{{ route('itineraries') }}" class="btn clearbtn1 ">Clear All filters <svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path d="M5.83203 14.1673L14.1654 5.83398" stroke="white" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M14.1654 14.1673L5.83203 5.83398" stroke="white" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="ajaxresponsedata">

        <div class="card-section py-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 px-0">
                        <div class="cards-item">
                            <div class="row">
                                @php
                                    $locationsArr = [];
                                @endphp
                                @if (!empty($itinerary))
                                    @foreach ($itinerary as $row)
                                        <div class="col-6 col-md-4 col-lg-3 ">
                                            @php
                                                $bgimage = !empty($row->seo_image) ? asset('/frontend/itineraries/' . $row->seo_image) : asset('frontend/images/annie-spratt.jpg');
                                            @endphp
                                            <div class="card bg-img position-relative r-12">
                                                <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"
                                                    class="h-100 text-decoration-none r-12">
                                                    <img src="{{ $bgimage }}" alt=""
                                                        class=" bright-70 h-100 bf-img r-12 w-100">
                                                </a>
                                                <div class=" position-absolute">
                                                    <a href="{{ route('username', ['username' => $row->user->username]) }}"
                                                        class="d-inline-flex text-dark text-decoration-none">
                                                        <div class="Ellipse bg-white m-3 rounded-pill p-1 gap-1">
                                                            <div class="">
                                                                {{-- <img src="{{ asset('frontend/images/toro (2).png') }}" alt=""> --}}
                                                                @if ($row->user->profile != '')
                                                                    <img src="{{ asset('frontend/profile_pictures/' . $row->user->profile) }}"
                                                                        alt="" class="width-48">
                                                                @else
                                                                    <img src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                                        alt="" class="width-48">
                                                                @endif
                                                            </div>
                                                            <div class="e-text-size  text-nowrap pe-2">
                                                                <span class="e-text-size ">{{ $row->user->name }}
                                                                    {{ $row->user->lastname }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="heart-icon">
                                                    @if (Auth::guard('user')->user())
                                                        @php
                                                            $query = \App\Models\Favorites::where('user_id', Auth::guard('user')->user()->id)
                                                                ->where('itineraries_id', $row->id)
                                                                ->get();
                                                        @endphp
                                                        @if ($query->count() == 1)
                                                            <a href="javascript:void(0)" data-role="removetowishlist"
                                                                data-id="{{ $row->id }}"> <img
                                                                    src="{{ asset('frontend/images/border-heart.svg') }}"
                                                                    alt="" class="path-img"></a>
                                                        @else
                                                            <a href="javascript:void(0)" data-role="addtowishlist"
                                                                data-id="{{ $row->id }}"> <img
                                                                    src="{{ asset('frontend/images/Path.png') }}"
                                                                    alt="" class="path-img"></a>
                                                        @endif
                                                    @else
                                                        <a href="javascript:void(0)" data-role="addtowishlistnotlogin">
                                                            <img src="{{ asset('frontend/images/Path.png') }}"
                                                                alt="" class="path-img"></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"
                                                style="text-decoration:none;">
                                                <h4 class="h-4">{{ $row->title }}</h4>
                                            </a>
                                            <div class="tags scroller-h">
                                                @if ($row->tags != '')
                                                    @php
                                                        $itinerarytag = json_decode($row->tags);
                                                    @endphp
                                                    @foreach ($itinerarytag as $itinerarytag)
                                                        @php
                                                            $tag = $row->tagsdata($itinerarytag);
                                                        @endphp

                                                        @if ($tag)
                                                            <a href="{{ url('/tags/' . $tag->slug) }}">
                                                                <button class="foodie text-nowrap">
                                                                    {{ $tag->name }}
                                                                </button>
                                                            </a>
                                                        @endif

                                                        {{-- {{ $itinerarytag }} --}}
                                                    @endforeach
                                                @endif
                                            </div>
                                            @if ($row->location_id != null && $row->itinerarylocations)
                                                @php
                                                    $link = route('itinerary', ['slug' => $row->slug]);
                                                    $title = $row->title;

                                                    $locationsArr[] = [
                                                        'url' => $link,
                                                        'title' => $title,
                                                        'lat' => $row->itinerarylocations->latitude,
                                                        'long' => $row->itinerarylocations->longitude,
                                                    ];
                                                @endphp
                                            @endif
                                            <p class="city">
                                                {{ $row->location_id != null && $row->itinerarylocations ? $row->itinerarylocations->address_city : 'Location' }}
                                                | {{ $row->created_at->diffForHumans() }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cpagination padding5050">
                                        <nav aria-label="Page navigation example">
                                            {{ $itinerary->links('vendor.pagination.custom_links') }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @php
            $locationArrJson = json_encode($locationsArr);
        @endphp

        {{-- <hr>
        <div class="world py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 px-0">
                        <div id="homepagemap" class="h-700p r-12"></div>
                    </div>
                </div>

            </div>
        </div> --}}

    </div>

    <script>
        $(document).ready(function() {

            $("#days-range").on('change', function() {
                var values = $(this).val();
                $("#rangslide").html(values + " days");

                if (values > 0) {
                    $(this).closest('.dropdown').find('button').addClass('activedropdown');
                } else {
                    $(this).closest('.dropdown').find('button').removeClass('activedropdown');
                }
            })

            if ($('#homepagemap').length > 0) {
                // Disabled the google map temperary
                // initMaps();

}

            function initMaps() {

                // execute
                var locations = JSON.parse('<?php echo $locationArrJson; ?>');

                var map = new google.maps.Map(document.getElementById('homepagemap'), {
                    zoom: 5,
                    /* Zoom level of your map */
                    center: new google.maps.LatLng(locations[0].lat, locations[0].long),

                    // center: new google.maps.LatLng(47.47021625, -100.47173475),
                    /* coordinates for the center of your map */
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                locations.forEach(function(location) {
                    // Accessing individual properties
                    var description = '<a href="' + location.url + '">' + location.title + '</a>';
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

                })
            }
        });

        $(".submitBtn").on('click', function(e) {
            e.preventDefault();
            var page = 0;
            var dataToSend = $("#filteForm").serialize();
            console.log(dataToSend + '&page=' + page);


            // Make the AJAX POST request
            $.ajax({
                    url: '{{ route('filteritineraries') }}', // Replace with your API endpoint URL
                    method: "POST",
                    data: dataToSend + '&page=' + page,
                })
                .done(function(response) {
                    // Handle the successful response
                    $("#ajaxresponsedata").html(response);
                    // console.log("Success:", response);
                    console.log("Request was successful!");
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Handle the failed response
                    console.log("Error:", errorThrown);
                    alert("Request failed!");
                });

        });


        $(document).on('click', 'a[data-role=btnfilterpagination]', function(e) {
            e.preventDefault();
            var page = $(this).data('offset');
            var limit = $(this).data('limit');
            var dataToSend = $("#filteForm").serialize();
            console.log(dataToSend + '&page=' + page + '&limit' + limit);


            // Make the AJAX POST request
            $.ajax({
                    url: '{{ route('filteritineraries') }}', // Replace with your API endpoint URL
                    method: "POST",
                    data: dataToSend + '&page=' + page,
                })
                .done(function(response) {
                    // Handle the successful response
                    $("#ajaxresponsedata").html(response);
                    // console.log("Success:", response);
                    console.log("Request was successful!");
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Handle the failed response
                    console.log("Error:", errorThrown);
                    alert("Request failed!");
                });

        });

        $(document).ready(function() {
            $('.form-check-input').on('change', function() {
                var checkbox = $(this);
                var value = checkbox.val();
                var label = checkbox.next().text();

                if (checkbox.is(':checked')) {
                    // Create a new selected item
                    var item = $('<label>', {
                        'class': 'btn clearbtn gap-2 d-flex justify-content-between align-items-center ',
                        'text': label + ' '
                    });

                    var cross = $(
                        '<span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"> <path d="M5.83203 14.1673L14.1654 5.83398" stroke="white" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.1654 14.1673L5.83203 5.83398" stroke="white" stroke-linecap="round" stroke-linejoin="round"/> </svg></span>'
                    );

                    item.append(cross);

                    // Add click event to remove the selected item
                    cross.on('click', function(e) {
                        checkbox.prop('checked', false);
                        item.remove();
                        if ($(checkbox).closest(".dropdown-menu").find('.selected-feild').find(
                                'label').length > 0) {
                            console.log('Found here')
                            $(checkbox).closest('.dropdown').find('button.dropdown-toggle')
                                .addClass('activedropdown');
                        } else {
                            console.log('Found else');
                            $(checkbox).closest('.dropdown').find('button.dropdown-toggle')
                                .removeClass('activedropdown');
                        }
                        // return false;

                    });

                    $(this).parents(".dropdown-menu").find('.selected-feild').append(item);

                } else {
                    // Remove the selected item
                    var items = $('.selected-feild label');
                    items.each(function() {
                        if ($(this).text().includes(label)) {
                            $(this).remove();
                            return false;
                        }
                    });
                }

                if ($(this).parents(".dropdown-menu").find('.selected-feild').find('label').length > 0) {
                    $(this).closest('.dropdown').find('button').addClass('activedropdown');
                } else {
                    $(this).closest('.dropdown').find('button').removeClass('activedropdown');
                }

            });
        });
    </script>
@endsection
