@extends('frontend.layouts.app')

@section('content')

    <div class="perfect py-5">
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
                <div class="row filter-bordr">

                    <div class="col-lg-2 col-sm-2 col-md-2 mt-2">
                        <div class="filter-logo">
                            <img src="{{ asset('frontend/images/Filter.png') }}" alt="" class="filter-logo-img">
                            <span>Filter</span>

                        </div>
                    </div>

                    <!-- Filter dropdown -->

                    <div class="col-lg-2 col-sm-2 col-md-2 mx-4">
                        <div class="dropdown ">
                            <button class="btn bg-dark text-white dropdown-toggle rounded-pill px-3 active"
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Location
                            </button>

                            <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton1">
                                <div id="selected-feild">
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <hr>
                                </div>
                                <form class="d-flex py-3">

                                    <input type="search" id="my-input" name="my-input" placeholder=" Enter location"
                                        class="locator rounded-pill px-2 mx-2 ">

                                    <button class="btn btn-secondary w-50 rounded-pill  text-white"
                                        type="go">Go</button>
                                </form>
                                <div class="filter-dropdown-header">
                                    <div class="form-check">
                                        <input type="checkbox" id="select-all-filter1" class="form-check-input">
                                        <label for="select-all-filter1" class="form-check-label">option</label>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option1"
                                                id="option1">
                                            <label for="option1" class="form-check-label">Option 1</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option2"
                                                id="option2">
                                            <label for="option2" class="form-check-label">Option 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option3"
                                                id="option3">
                                            <label for="option3" class="form-check-label">Option 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option4"
                                                id="option4">
                                            <label for="option4" class="form-check-label">Option 4</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option5"
                                                id="option5">
                                            <label for="option5" class="form-check-label">Option 5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option6"
                                                id="option6">
                                            <label for="option6" class="form-check-label">Option 6</label>
                                        </div>
                                    </div>
                                </div>

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
                                <div id="selected-feild">
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <hr>
                                </div>
                                <form class="d-flex py-3">

                                    <input type="search" id="my-input" name="my-input" placeholder=" Tags"
                                        class="locator rounded-pill px-2 mx-2 ">
                                    <button class="btn btn-secondary w-50 rounded-pill text-white"
                                        type="gos">Go</button>
                                </form>
                                <div class="filter-dropdown-header">
                                    <div class="form-check">
                                        <input type="checkbox" id="select-all-filter1" class="form-check-input">
                                        <label for="select-all-filter1" class="form-check-label">option</label>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option1"
                                                id="option1">
                                            <label for="option1" class="form-check-label">Option 1</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option2"
                                                id="option2">
                                            <label for="option2" class="form-check-label">Option 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option3"
                                                id="option3">
                                            <label for="option3" class="form-check-label">Option 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option4"
                                                id="option4">
                                            <label for="option4" class="form-check-label">Option 4</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option5"
                                                id="option5">
                                            <label for="option5" class="form-check-label">Option 5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option6"
                                                id="option6">
                                            <label for="option6" class="form-check-label">Option 6</label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-2 col-md-2 ">
                        <div class="dropdown">
                            <button class="btn bg-light dropdown-toggle rounded-pill px-3" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                User
                            </button>

                            <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton1">
                                <div id="selected-feild">
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <hr>
                                </div>
                                <form class="d-flex py-3">

                                    <input type="search" id="my-input" name="my-input" placeholder=" User"
                                        class="locator rounded-pill px-2 mx-2">
                                    <button class="btn btn-secondary w-50 rounded-pill  text-white"
                                        type="gos">Go</button>
                                </form>
                                <div class="filter-dropdown-header">
                                    <div class="form-check">
                                        <input type="checkbox" id="select-all-filter1" class="form-check-input">
                                        <label for="select-all-filter1" class="form-check-label">option</label>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option1"
                                                id="option1">
                                            <label for="option1" class="form-check-label">Option 1</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option2"
                                                id="option2">
                                            <label for="option2" class="form-check-label">Option 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option3"
                                                id="option3">
                                            <label for="option3" class="form-check-label">Option 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option4"
                                                id="option4">
                                            <label for="option4" class="form-check-label">Option 4</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option5"
                                                id="option5">
                                            <label for="option5" class="form-check-label">Option 5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option6"
                                                id="option6">
                                            <label for="option6" class="form-check-label">Option 6</label>
                                        </div>
                                    </div>
                                </div>


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
                                <div id="selected-feild">
                                    <button
                                        class="btn btn-light rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">5-7 days <span>x</span>
                                    </button>

                                    <!-- <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button>
                                    <button
                                        class="btn btn-light w-25 rounded-pill  text-white d-flex justify-content-between align-items-center "
                                        type="go">Go <span>X</span>
                                    </button> -->

                                </div>
                                <hr>
                                <form class="form-rang ">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p>Min</p>
                                            <p>Max</p>
                                        </div>
                                        <!-- <input type="range" id="days" min="5" max="7" step="1"> -->
                                        <input type="range" class="form-range" id="days-range" name="days-range" min="1" max="14" value="7" step="2">

                                    </div>
                                    <div>
                                        <p><button class="btn btn-secondary w-50 rounded-pill  bg-light text-dark" type="gos">5</button></p>
                                        <p><button class="btn btn-secondary w-50 rounded-pill  bg-light text-dark" type="gos">7</button></p>
                                    <p><button class="btn btn-secondary w-50 rounded-pill  bg-dark text-white" type="gos">Go</button></p>
                                    </div>

                                </form>
                                <!-- <div class="filter-dropdown-header">
                                    <div class="form-check">
                                        <input type="checkbox" id="select-all-filter1" class="form-check-input">
                                        <label for="select-all-filter1" class="form-check-label">option</label>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option1" id="option1">
                                            <label for="option1" class="form-check-label">Option 1</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option2" id="option2">
                                            <label  for="option2" class="form-check-label">Option 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option3" id="option3">
                                            <label for="option3" class="form-check-label">Option 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option4"  id="option4">
                                            <label  for="option4" class="form-check-label">Option 4</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option5" id="option5">
                                            <label  for="option5" class="form-check-label">Option 5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input filter" value="option6" id="option6">
                                            <label for="option6" class="form-check-label">Option 6</label>
                                        </div>
                                    </div>
                                </div> -->


                            </div>
                        </div>
                    </div>


                </div>

                <div id="selected-feild">
                    <button
                        class="btn btn-light d-flex justify-content-between align-items-center px-3 rounded-pill">Clear
                        All filters x</button>
                </div>

            </div>
        </div>
    </div>


    <div class="card-section py-3">
        <div class="container">
            <div class="cards-item">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card bg-img">
                            <div class=" m-3  Ellipse bg-white rounded-pill p-1">
                                <div class="">
                                    <img src="{{ asset('frontend/images/Ellipse 4.png') }}" alt="">
                                </div>
                                <div class=" ">
                                    <span class="mx-1">Benjamin Franklin</span>
                                </div>
                            </div>
                            <div class="heart-icon">
                                <a href="#"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                            </div>
                        </div>
                        <h4 class="h-4">My Spring Break Trip</h4>
                        <div class="tags">
                            <a href="#"> <button class="foodie">Foodie</button></a>
                            <a href="#"> <button class="foodie">Backpacker</button></a>
                            <a href="#"> <button class="foodie">Backpacker</button></a>
                            <a href="#"> <button class="foodie">Backpacker</button></a>
                        </div>
                        <p class="city">Mexico City | 3 Days</p>
                    </div>

                    <div class="col-lg-3">
                        <div class="card bg-toro">
                            <div class="Ellipse bg-white m-3 rounded-pill p-1">
                                <div class="">
                                    <img src="{{ asset('frontend/images/toro (2).png') }}" alt="">
                                </div>
                                <div class=" ">
                                    <span class="mx-3">Justin Lang</span>
                                </div>
                            </div>
                            <div class="heart-icon">
                                <a href="#"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                            </div>
                        </div>
                        <h4 class="h-4">My Winter Break 2022</h4>
                        <div class="tags">
                            <a href="#"> <button class="foodie">Cold</button></a>
                            <a href="#"> <button class="foodie">Travel</button></a>
                            <!-- <a href="#"> <button class="foodie">Backpacker</button></a>
                            <a href="#"> <button class="foodie">Backpacker</button></a> -->
                        </div>
                        <p class="city">Toronto | 6 Days</p>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-fax">
                            <div class="Ellipse bg-white m-3 rounded-pill p-1">
                                <div class="">
                                    <img src="{{ asset('frontend/images/toro (2).png') }}" alt="">
                                </div>
                                <div class=" ">
                                    <span class="mx-3">Justin Lang</span>
                                </div>
                            </div>
                            <div class="heart-icon">
                                <a href="#"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                            </div>
                        </div>
                        <h4 class="h-4 ">Autumn Escape</h4>
                        <div class="tags">
                            <a href="#"> <button class="foodie">Leaves</button></a>
                            <a href="#"> <button class="foodie">Coffee</button></a>
                            <a href="#"> <button class="foodie">Planned</button></a>
                            <a href="#"> <button class="foodie">Fun</button></a>
                        </div>
                        <p class="city">Scotland | 6 Days</p>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-turk">
                            <div class="Ellipse bg-white m-3 rounded-pill p-1">
                                <div class="">
                                    <img src="{{ asset('frontend/images/toro (2).png') }}" alt="">
                                </div>
                                <div class=" ">
                                    <span class="mx-3">Justin Lang</span>
                                </div>
                            </div>
                            <div class="heart-icon">
                                <a href="#"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                            </div>
                        </div>
                        <h4 class="h-4">Semester Abroad</h4>
                        <div class="tags">
                            <a href="#"> <button class="foodie">Leaves</button></a>
                            <a href="#"> <button class="foodie">Coffee</button></a>
                            <a href="#"> <button class="foodie">Planned</button></a>
                            <a href="#"> <button class="foodie">Fun</button></a>
                        </div>
                        <p class="city">Turkey | 3 Days</p>
                    </div>
                </div>
              

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card bg-img">
                            <div class="Ellipse bg-white m-3 rounded-pill p-1">
                                <div class="">
                                    <img src="{{ asset('frontend/images/toro (2).png') }}" alt="">
                                </div>
                                <div class=" ">
                                    <span class="mx-3">Justin Lang</span>
                                </div>
                            </div>
                            <div class="heart-icon">
                                <a href="#"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                            </div>
                        </div>
                        <h4 class="h-4">My Spring Break Trip</h4>
                        <div class="tags">
                            <a href="#"> <button class="foodie">Foodie</button></a>
                            <a href="#"> <button class="foodie">Backpacker</button></a>
                            <a href="#"> <button class="foodie">Backpacker</button></a>
                            <a href="#"> <button class="foodie">Backpacker</button></a>
                        </div>
                        <p class="city">Mexico City | 3 Days</p>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <hr>
    <div class="world py-4">
        <div class="container">
            <div class="map">
                <iframe src="https://www.google.com/maps/d/embed?mid=1PdXSyjjbalDBQ2IKJDLhTgnq_9E&hl=en_US&ehbc=2E312F"
                    width="100%" height="550"></iframe>
            </div>
        </div>
    </div>



@endsection
