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
                        <a href="{{route('itinerary', ['slug' => $row->slug])}}" class="h-100 text-decoration-none">
                            <img src="{{ $bgimage }}" alt="" class=" bright-70 h-100 bf-img w-100">
                        </a>
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
                            $link = route("itinerary", ["slug" => $row->slug]);
                            $title = $row->title;

                            $locationsArr[] = [
                                'url' => $link,
                                'title' => $title,
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
                            <ul class="pagination">
                                @php
                                    $totalPages = ceil($total / $limit);
                                @endphp

                                @if ($offset > 0)
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);" data-role="btnfilterpagination" data-offset="{{$offset-1}}" data-limit="{{$limit}}" aria-label="Previous"> <span aria-hidden="true"><i class="fas fa-caret-left"></i></span>
                                        </a>
                                    </li>
                                    <!-- <a href="javascript:void(0);" data-role="btnfilterpagination" data-offset="{{$offset-1}}" data-limit="{{$limit}}">Previous</a> -->
                                @endif

                                @for ($i = 0; $i < $totalPages; $i++)
                                    @if ($i == $offset)
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">{{ $i+1 }}</a></li>
                                        <!-- <span>{{ $i+1 }}</span> -->
                                    @else
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);" data-role="btnfilterpagination" data-offset="{{$i}}" data-limit="{{$limit}}">{{ $i+1 }}</a></li>
                                        <!-- <a href="javascript:void(0);" data-role="btnfilterpagination" data-offset="{{$i}}" data-limit="{{$limit}}">{{ $i+1 }}</a> -->
                                    @endif
                                @endfor

                                @if ($offset < $totalPages - 1)
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);" data-role="btnfilterpagination" data-offset="{{$offset+1}}" data-limit="{{$limit}}" aria-label="Next"> <span aria-hidden="true"><i class="fas fa-caret-right"></i></span>
                                        </a>
                                    </li>
                                    <!-- <a href="javascript:void(0);" data-role="btnfilterpagination" data-offset="{{$offset+1}}" data-limit="{{$limit}}">Next</a> -->
                                @endif
                            </ul>
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
            if(locations){

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
                    var description = '<a href="'+location.url+'">'+location.title+'</a>';
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

                })

            }
        }
    });

</script>
