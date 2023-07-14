@extends('frontend.layouts.app')

@section('content')

    <div class="perfect py-md-5 py-3">
        <div class="container">
            <div class="perfect-item ">
                <h3 class="travel">Find the Perfect Travel Itinerary</h3>
                <p class="filters-p">Filter by location, trip length, tag or user. Don’t see your location? New
                    itineraries are added by users everyday - or take it upon yourself to write the first one!
                </p>
            </div>
        </div>
    </div>

    <div class="filter">
        <div class="container">
            <div class="filter-body">
                <form action="{{ route('filteritineraries') }}" method="POST" class="d-flex justify-content-between w-100">

                    <div class="d-flex flex-wrap filter-bordr gap-1">

                        <div class=" d-flex gap-2 align-items-center">
                            <div class="filter-logo">
                                @csrf
                                <img src="{{ asset('frontend/images/Filter.png') }}" alt="" class="filter-logo-img">
                                <span>Filter</span>

                            </div>
                            <div class="vr"></div>
                        </div>

                        <!-- Filter dropdown -->

                        <div class="col-lg-2 col-sm-2 col-md-2">
                            <div class="dropdown ">
                                <button class="btn bg-light border-0 dropdown-toggle rounded-pill px-3 active" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Location
                                </button>

                                <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton1">
                                    <div id="selected-feild" class="selected-feild d-flex gap-1 flex-wrap">
                                        @if(isset($filteredlocations) && !empty($filteredlocations))
                                        @foreach($filteredlocations as $filteredlocations)
                                        <label for="optionaddr{{$filteredlocations->itinerarylocations->address_city}}" class="btn btn-light rounded-pill gap-2 text-white d-flex justify-content-between align-items-center">{{$filteredlocations->itinerarylocations->address_city}} <span>X</span>
                                        </label>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="d-flex py-3">
                                        <input type="search" id="my-input" name="my-input" placeholder=" Locations" class="locator rounded-pill px-2 mx-2 ">
                                        <button class="btn btn-secondary w-50 rounded-pill  text-white" type="submit">Go</button>
                                    </div>

                                        <?php $count = 1;?>
                                        @if(!empty($filter))
                                            @foreach($filter as $filteritem)
                                                @if($filteritem->location_id != '0' && $filteritem->itinerarylocations)
                                                    <div class="row py-2">
                                                        <div class="col-lg-12">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="location[]" class="form-check-input filter" value="{{$filteritem->location_id}}" id="optionaddr{{$filteritem->itinerarylocations->address_city}}" {{ (isset($locationfilter) && in_array($filteritem->location_id, $locationfilter)) ? 'checked' : '' }}>
                                                                <label for="optionaddr{{$filteritem->itinerarylocations->address_city}}" class="form-check-label">{{$filteritem->itinerarylocations->address_city}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <?php $count++?>
                                            @endforeach
                                        @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 ">
                            <div class="dropdown">
                                <button class="btn bg-light dropdown-toggle rounded-pill px-3" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tags
                                </button>

                                <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton1">
                                    <div id="selected-feild" class="selected-feild d-flex gap-1 flex-wrap">

                                        <hr>
                                    </div>
                                    <div class="d-flex py-3">

                                        <input type="search" id="my-input" name="tags-input" placeholder=" Tags" class="locator rounded-pill px-2 mx-2 ">
                                        <button class="btn btn-secondary w-50 rounded-pill text-white" type="submit">Go</button>
                                    </div>
                                    <?php $count1 = 1;?>

                                    @if(!empty($tags))
                                        @foreach($tags as $singletag)
                                            @if ($singletag)

                                                <div class="row py-2">
                                                    <div class="col-lg-12">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="tags[]" class="form-check-input filter" value="{{$singletag->id}}" id="optiontag{{$count1}}"  {{ (isset($tagsfilter) && in_array($singletag->id, $tagsfilter)) ? 'checked' : '' }}>
                                                            <label for="optiontag{{$count1}}" class="form-check-label">{{$singletag->name}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $count1++;?>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 ">
                            <div class="dropdown">
                                <button class="btn bg-light dropdown-toggle rounded-pill px-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> User </button>

                                <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton1">
                                    <div id="selected-feild" class="selected-feild d-flex gap-1 flex-wrap">
                                        @if(isset($filteredusers) && !empty($filteredusers))
                                        @foreach($filteredusers as $filteredusers)
                                        <label for="optionuser{{$filteredusers->user->name}}" class="btn btn-light rounded-pill gap-2 text-white d-flex justify-content-between align-items-center">{{$filteredusers->user->name}} <span>X</span>
                                        </label>
                                        @endforeach
                                        @endif
                                        <hr>
                                    </div>
                                    <div class="d-flex py-3">
                                        <input type="search" id="my-input" name="my-input" name="user_search"placeholder=" User" class="locator rounded-pill px-2 mx-2">
                                        <button class="btn btn-secondary w-50 rounded-pill  text-white" type="gos">Go</button>
                                    </div>
                                    <?php $count2 = 1;?>
                                    @if(!empty($user_filter))
                                    @foreach($user_filter as $filter)
                                    <div class="row py-2">
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input filter" name="users[]" value="{{$filter->id}}" id="optionuser{{$filter->name}}" {{ (isset($usersfilter) && in_array($filter->id, $usersfilter)) ? 'checked' : '' }}>
                                                <label for="optionuser{{$filter->name}}" class="form-check-label">{{$filter->name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count2++;?>
                                    @endforeach
                                    @endif


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 ">
                            <div class="dropdown">
                                <button class="btn bg-light dropdown-toggle rounded-pill px-3" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Trip length
                                </button>

                                <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton1">
                                    <div id="selected-feild" class="selected-field">
                                        <button
                                            class="btn btn-primary rounded-pill gap-2 text-white d-flex justify-content-between align-items-center  ">
                                            {{ (isset($daysrange)) ? '0-'.$daysrange : '0' }} days
                                            <span>x</span>
                                        </button>
                                    </div>
                                    <hr>
                                    <div class="form-rang ">
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p>Min</p>
                                                <p>Max</p>
                                            </div>
                                            <!-- <input type="range" id="days" min="5" max="7" step="1"> -->
                                            <input type="range" class="form-range" id="days-range" name="daysrange" min="{{$smallestnumber}}" max="{{$largestnumber}}" value="{{ (isset($daysrange)) ? $daysrange : $largestnumber }}" step="2">

                                        </div>
                                        <div>
                                            <!-- <p><button class="btn btn-secondary w-50 rounded-pill  bg-light text-dark" type="gos">5</button></p>
                                            <p><button class="btn btn-secondary w-50 rounded-pill  bg-light text-dark" type="gos">7</button></p> -->
                                            <p><button class="btn btn-secondary w-50 rounded-pill  bg-dark text-white" type="gos">Go</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="selected-feild">
                        <a href="{{ route('itineraries') }}" class="btn clearbtn btn-light rounded-pill gap-2 text-white d-flex justify-content-between align-items-center">Clear All filters x</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card-section py-3">
        <div class="container">
            <div class="cards-item">
                <div class="row">
                    @php
                    $locationsArr = [];
                    @endphp
                    @if(!empty($itinerary))
                    @foreach($itinerary as $row)
                    <div class="col-6 col-md-4 col-lg-3 ">
                        @php
                             $bgimage = (!empty($row->seo_image)) ? asset("/frontend/itineraries/".$row->seo_image) : asset('frontend/images/annie-spratt.jpg');
                        @endphp
                        <div class="card bg-img position-relative" style="background-image: url('{{ $bgimage }}');">
                            <img src="{{ $bgimage }}" alt="" class=" bright-70 h-100 bf-img">
                            <div class=" position-absolute">
                            <a href="{{ route('username', ['username' => $row->user->username]) }}" class="d-inline-flex text-dark text-decoration-none">
                                <div class="Ellipse bg-white m-3 rounded-pill p-1 gap-1">
                                    <div class="">
                                        {{-- <img src="{{ asset('frontend/images/toro (2).png') }}" alt=""> --}}
                                        @if($row->user->profile != '')
                                        <img src="{{ asset('frontend/profile_pictures/'.$row->user->profile) }}" alt="" class="width-48">
                                        @else
                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="width-48">
                                        @endif
                                    </div>
                                    <div class="e-text-size  text-nowrap pe-2">
                                        <span class="e-text-size ">{{ $row->user->name}} {{ $row->user->lastname}}</span>
                                    </div>
                                </div>
                            </a>
                            </div>

                            <div class="heart-icon">
                                @if(Auth::guard('user')->user())
                                @php
                                $query = \App\Models\Favorites::where('user_id',Auth::guard('user')->user()->id)
                                ->where('itineraries_id',$row->id)
                                ->get();
                                @endphp
                                @if($query->count() == 1)
                                <a href="javascript:void(0)" data-role="removetowishlist" data-id="{{ $row->id}}"> <img src="{{ asset('frontend/images/border-heart.svg') }}" alt="" class="path-img"></a>
                                @else
                                <a href="javascript:void(0)" data-role="addtowishlist" data-id="{{ $row->id}}"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                                @endif
                                @else
                                <a href="javascript:void(0)" data-role="addtowishlistnotlogin"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                                @endif
                            </div>
                        </div>
                        <a href="{{route('itinerary', ['slug' => $row->slug])}}" style="text-decoration:none;"><h4 class="h-4">{{ $row->title}}</h4></a>
                        <div class="tags">
                                @if($row->tags != '')
                                @php
                                $itinerarytag = json_decode($row->tags);
                                @endphp
                                @foreach($itinerarytag as $itinerarytag)
                                    @php
                                        $tag = $row->tagsdata($itinerarytag);
                                    @endphp

                                    @if($tag)
                                    <a href="{{url('/tags/'.$tag->slug)}}">
                                        <button class="foodie">
                                            {{$tag->name}}
                                        </button>
                                    </a>
                                    @endif

                                {{-- {{ $itinerarytag }} --}}
                                @endforeach
                                @endif
                        </div>
                        @if(($row->location_id != NULL && $row->itinerarylocations))
                            @php
                                $link = '<a href="' . route("itinerary", ["slug" => $row->slug]) . '">' . $row->title . '</a>';

                                $locationsArr[] = [
                                    'description' => htmlspecialchars($link, ENT_QUOTES, 'UTF-8'),
                                    'lat'=>$row->itinerarylocations->latitude,
                                    'long'=>$row->itinerarylocations->longitude
                                ];
                            @endphp
                        @endif
                        <p class="city">{{ ($row->location_id != NULL && $row->itinerarylocations) ? $row->itinerarylocations->address_city : 'Location' }} | {{ $row->created_at->diffForHumans() }}</p>
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
    @php
    $locationArrJson = json_encode($locationsArr);
    @endphp

    <hr>
    <div class="world py-4">
        <div class="container">
            <div id="homepagemap" style="height: 450px;"></div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            if ($('#homepagemap').length > 0) {

            initMaps();
            }

            function initMaps() {

            // execute
            var locations = JSON.parse( '<?php echo $locationArrJson;?>' );
            // var locations = [
            //     {
            //         'description': '<b>Name 1</b><br>Address Line 1<br>Bismarck, ND 58501<br>Phone: 701-555-1234<br><a href="#" >Link<a> of some sort.',
            //         'lat': 46.8133,
            //         'long': -100.7790,
            //     },
            //     {
            //         'description': '<b>Name 2</b><br>Address Line 1<br>Fargo, ND 58103<br>Phone: 701-555-4321<br><a href="#" target="_blank">Link<;> of some sort.',
            //         'lat': 46.8772,
            //         'long': -96.7894,
            //     }
            // ];

            console.log(locations)

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

            locations.forEach(function (location) {
                // Accessing individual properties
                var description = location.description;
                var lat = location.lat;
                var long = location.long;

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, long),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
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
        });

        $(document).ready(function() {
            $('.form-check-input').on('change', function() {
                var checkbox = $(this);
                var value = checkbox.val();
                var label = checkbox.next().text();

                if (checkbox.is(':checked')) {
                    // Create a new selected item
                    var item = $('<label>', {
                        'class': 'btn btn-light rounded-pill gap-2 text-white d-flex justify-content-between align-items-center',
                        'text': label + ' '
                    });

                    var cross = $('<span>', {
                        'text': 'X'
                    });

                    item.append(cross);

                    // Add click event to remove the selected item
                    cross.on('click', function() {
                        checkbox.prop('checked', false);
                        item.remove();
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
            });
        });
    </script>
@endsection
