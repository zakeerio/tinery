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
                            <a href="{{ route('admin.itineraries.index') }}">Itineraries</a>
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
                            <a class="btn btn-success" href="{{ route('admin.itineraries.index') }}">
                                <i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- {!! Form::open(['route' => 'admin.itineraries.store', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success">CREATE</button>
                            </div>
                        </div>
                        {!! Form::close() !!} --}}

                        {!! Form::open(['route' => 'admin.itineraries.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            @csrf
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'rows' => 5]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('excerpt', 'Excerpt') !!}
                            {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'required', 'rows' => 3]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('seo_title', 'SEO Title') !!}
                            {!! Form::text('seo_title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('seo_description', 'SEO Description') !!}
                            {!! Form::textarea('seo_description', null, ['class' => 'form-control', 'rows' => 3]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('seo_image', 'SEO Image') !!}
                            {!! Form::file('seo_image', ['class' => 'form-control-file']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('author', 'Author') !!}
                            {!! Form::text('author', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('categories', 'Categories') !!}
                            @php
                                $listcategories = [];
                                $categories = \App\Models\Categories::get();
                            @endphp
                            @foreach ($categories as $key => $categories)
                                @php
                                    $listcategories[$categories->id] = $categories->name;
                                @endphp
                            @endforeach
                            {!! Form::select('categories[]', $listcategories, null, ['class' => 'form-control select2', 'multiple' => true]) !!}
                        </div>
                        <div class="form-group">
                            @php
                                $listtags = [];
                                $tags = \App\Models\Tags::get();
                            @endphp
                            @foreach ($tags as $key => $tags)
                                @php
                                    $listtags[$tags->name] = $tags->name;
                                @endphp
                            @endforeach
                            {!! Form::label('tags', 'Tags') !!}
                            {!! Form::select('tags[]', $listtags, null, ['class' => 'form-control select2-tags', 'multiple' => true]) !!}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('address_street', 'Street') !!}
                                {!! Form::text('address_street', null, ['class' => 'form-control', 'id' => 'address']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('address_street_line1', 'Street Line 1') !!}
                                {!! Form::text('address_street_line1', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('address_city', 'City') !!}
                                {!! Form::text('address_city', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('address_state', 'State') !!}
                                {!! Form::text('address_state', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('address_zipcode', 'Zipcode', null, ['class' => 'form-control']) !!}
                                {!! Form::text('address_zipcode', null, ['class' => 'form-control']) !!}

                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('address_country', 'Country') !!}
                                {!! Form::text('address_country', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('latitude', 'Latitude') !!}
                                {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('longitude', 'Longitude') !!}
                                {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('website', 'Website') !!}
                            {!! Form::text('website', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('additional_info', 'Additional Info') !!}
                            {!! Form::textarea('additional_info', null, ['class' => 'form-control', 'rows' => 5]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('featured', 'Featured') !!}
                            {!! Form::select('featured', ['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('visibility', 'Visibility') !!}
                                {!! Form::select('visibility', ['public' => 'Public', 'private' => 'Private'], null, [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('status', 'Status') !!}
                                {!! Form::select('status', ['published' => 'Published', 'draft' => 'Draft'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card">
                                {{-- <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Section 1 <i class="fa fa-angle-right float-right"></i>
                                        </button>
                                    </h5>
                                </div> --}}



                                {{-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                {!! Form::label('activitytitle', 'Activity Time') !!}
                                                {!! Form::text('activitytitle',null , ["class"=>"form-control"]) !!}
                                            </div>
                                            <div class="col-md-5">
                                                {!! Form::label('activitytime', 'Activity Time') !!}
                                                {!! Form::time('activitytime',null , ["class"=>"form-control"]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('activitytime', 'Activity Description') !!}
                                            {!! Form::textarea("activitydescription", null, ["class"=>"form-control", "rows" => "3"]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Section 2 <i class="fa fa-angle-right float-right"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        Fusce eget elit et eros vehicula congue. Nunc pellentesque lectus non risus
                                        molestie, nec malesuada sapien fringilla. Donec euismod interdum arcu, non lobortis
                                        diam malesuada non.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Section 3 <i class="fa fa-angle-right float-right"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        Nulla facilisi. Nulla tincidunt augue velit, vel bibendum ex maximus ac. Sed
                                        scelerisque augue ex, ut ullamcorper tortor iaculis a. In hac habitasse platea
                                        dictumst.
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div id="main">
                                <div class="accordion" id="faq">

                                    <div class="card days-box" id="card1">
                                        <a href="#" class="btn btn-danger remove-btn rounded-circle d-none" title="Delete Day"><i class="fa fa-minus"></i></a>

                                        <div class="card-header" id="faqhead3">
                                            <a href="#" class="btn btn-header-link text-bold" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">Day 1</a>
                                        </div>

                                        <div id="faq1" class="collapse " aria-labelledby="faqhead3" data-parent="#faq">
                                            <div class="card-body activities-body">
                                                <div class="card activities-box">
                                                    <div class="card-header" id="faqhead31">
                                                        <a href="#" class="btn btn-header-link  text-bold" data-toggle="collapse" data-target="#faq11" aria-expanded="true" aria-controls="faq11">Day 1 Activity First</a>
                                                    </div>

                                                    <div id="faq11" class="collapse show single-activity-body" aria-labelledby="faqhead31" data-parent="#faq11">
                                                        <div class="card-body">
                                                            <div class="form-group d-flex">
                                                                <div class="col-md-6">
                                                                    {!! Form::label('activitytitle', 'Activity Time') !!}
                                                                    {!! Form::text('activitytitle',null , ["class"=>"form-control"]) !!}
                                                                </div>
                                                                <div class="col-md-3">
                                                                    {!! Form::label('activitytime', 'Activity Time') !!}
                                                                    {!! Form::time('activitytime',null , ["class"=>"form-control"]) !!}
                                                                </div>
                                                                <div class="col-md-3">
                                                                    {!! Form::label('activitytime', 'Activity Time') !!}
                                                                    {!! Form::time('activitytime',null , ["class"=>"form-control"]) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                {!! Form::label('activitydescription', 'Activity Description') !!}
                                                                {!! Form::textarea("activitydescription", null, ["class"=>"form-control", "rows" => "3"]) !!}
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-group d-flex justify-content-end">
                                                    <button class="btn btn-info add-activitybtn" title="Add Activity"><i class="fa fa-plus-circle"></i> Add Activity</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- <div class="card">
                                        <a href="#" class="btn btn-danger remove-btn rounded-circle" title="Delete Day"><i class="fa fa-minus"></i></a>

                                        <div class="card-header" id="faqhead3">
                                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq2" aria-expanded="true" aria-controls="faq2">S.S.S</a>
                                        </div>

                                        <div id="faq2" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header" id="faqhead31">
                                                        <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq21" aria-expanded="true" aria-controls="faq21">S.S.S</a>
                                                    </div>

                                                    <div id="faq21" class="collapse" aria-labelledby="faqhead31" data-parent="#faq21">
                                                        <div class="card-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-group d-flex justify-content-end">
                                                    <button class="btn btn-info add-activitybtn" title="Add Activity"><i class="fa fa-plus-circle"></i> Add Activity</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card">
                                        <a href="#" class="btn btn-danger remove-btn rounded-circle" title="Delete Day"><i class="fa fa-minus"></i></a>

                                        <div class="card-header" id="faqhead3">
                                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq3" aria-expanded="true" aria-controls="faq3">S.S.S</a>
                                        </div>

                                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header" id="faqhead31">
                                                        <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq31" aria-expanded="true" aria-controls="faq31">S.S.S</a>
                                                    </div>

                                                    <div id="faq31" class="collapse" aria-labelledby="faqhead31" data-parent="#faq31">
                                                        <div class="card-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-group d-flex justify-content-end">
                                                    <button class="btn btn-info add-activitybtn" title="Add Activity"><i class="fa fa-plus-circle"></i> Add Activity</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div> --}}


                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-success add-activity-day" title="Add Activity"><i class="fa fa-plus-circle"> Add Day</i></button>
                                </div>

                        </div>



                        <div id="map" style="height: 500px; width:100%;"></div>

                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.partials.scripts')


<script>
    $(document).ready(function() {
        // Add click event to accordion header buttons
        $('.card-header button').click(function(e) {
            // Toggle the right-side icon
            e.preventDefault();
            $(this).find('i').toggleClass('fa-angle-right fa-angle-down');
        });


        // // Create a new accordion with a unique ID
        // var accordion_id = "faq" + (Math.floor(Math.random() * 100000) + 1); // Generate a unique ID for the new accordion
        // var accordion = $("<div>", {id: accordion_id, class: "collapse", "aria-labelledby": "faqhead3", "data-parent": "#faq"});

        // // Create the accordion body
        // var accordion_body = $("<div>", {class: "card-body activities-body"});
        // var card = $("<div>", {class: "card activities-box"});
        // var card_header = $("<div>", {class: "card-header", "aria-labelledby": "faqhead31"});
        // var link = $("<a>", {href: "#", class: "btn btn-header-link  text-bold", "data-toggle": "collapse", "data-target": "#faq11", "aria-expanded": "true", "aria-controls": "faq11", text: "Day 1 Activity First"});
        // var accordion_inner_body = $("<div>", {id: "faq11", class: "collapse show single-activity-body", "aria-labelledby": "faqhead31", "data-parent": "#" + accordion_id});
        // var card_inner_body = $("<div>", {class: "card-body"});
        // var form_group1 = $("<div>", {class: "form-group d-flex"});
        // var col1 = $("<div>", {class: "col-md-6"});
        // var label1 = $("<label>", {for: "activitytitle", text: "Activity Time"});
        // var input1 = $("<input>", {type: "text", name: "activitytitle", class: "form-control"});
        // var col2 = $("<div>", {class: "col-md-6"});
        // var label2 = $("<label>", {for: "activitytime", text: "Activity Time"});
        // var input2 = $("<input>", {type: "time", name: "activitytime", class: "form-control"});
        // var form_group2 = $("<div>", {class: "form-group"});
        // var label3 = $("<label>", {for: "activitydescription", text: "Activity Description"});
        // var textarea = $("<textarea>", {name: "activitydescription", class: "form-control", rows: "3"});

        // // Add the accordion body elements
        // col1.append(label1, input1);
        // col2.append(label2, input2);
        // form_group1.append(col1, col2);
        // form_group2.append(label3, textarea);
        // card_inner_body.append(form_group1, form_group2);
        // accordion_inner_body.append(card_inner_body);
        // link.appendTo(card_header);
        // card_header.appendTo(card);
        // accordion_inner_body.appendTo(card);
        // card.appendTo(accordion);
        // accordion_body.append(card);

        // // Add the "Add Activity" button
        // var button = $("<button>", {class: "btn btn-info add-activitybtn", title: "Add Activity", html: '<i class="fa fa-plus-circle"></i> Add Activity'});
        // var button_container = $("<div>", {class: "form-group d-flex justify-content-end"});
        // button.appendTo(button_container);
        // accordion_body.append(button_container);

        // // Append the new accordion to the parent element
        // accordion.appendTo("#faq");




    });

    var special = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth', 'eleventh', 'twelfth', 'thirteenth', 'fourteenth', 'fifteenth', 'sixteenth', 'seventeenth', 'eighteenth', 'nineteenth'];
    var deca = ['twent', 'thirt', 'fort', 'fift', 'sixt', 'sevent', 'eight', 'ninet'];

    function stringifyNumber(n) {
    if (n < 20) return special[n];
    if (n%10 === 0) return deca[Math.floor(n/10)-2] + 'ieth';
        return deca[Math.floor(n/10)-2] + 'y-' + special[n%10];
    }

    // TEST LOOP SHOWING RESULTS
    // for (var i=0; i<100; i++)
    // console.log(stringifyNumber(3));

    $(document).on("click", ".add-activity-day", function(e){
        e.preventDefault();
        var card_data = $("#faq #card1").clone();
        $(card_data).removeAttr('id');
        card_data.find('.remove-btn').removeClass('d-none');
        $("#faq").append(card_data);
    })

    $(document).on("click", ".btn-danger.remove-btn", function(e){
        e.preventDefault();
        $(this).parent('.card').remove();

    })

    $(document).on("click", ".add-activitybtn", function(e){
        e.preventDefault();
        var clone_box  = $(this).closest('.activities-body .activities-box').clone();
        var cloned = $(this).closest(".card-body.activities-body").appendTo(clone_box);
        console.log(clone_box);

    })
</script>

@php
    $key = env('GOOGLE_MAP_API_KEY');
@endphp
<script src="https://maps.googleapis.com/maps/api/js?key={{ $key }}"></script>

<script>

$(document).ready(function () {
        // execute
        (function () {
          // map options
          var options = {
            zoom: 5,
            center: new google.maps.LatLng(39.909736, -98.522109), // centered US
            mapTypeId: google.maps.MapTypeId.TERRAIN,
            mapTypeControl: false,
          };

          // init map
          var map = new google.maps.Map(
            document.getElementById('map'),
            options
          );

          // NY and CA sample Lat / Lng
          var southWest = new google.maps.LatLng(40.744656, -74.005966);
          var northEast = new google.maps.LatLng(34.052234, -118.243685);
          var lngSpan = northEast.lng() - southWest.lng();
          var latSpan = northEast.lat() - southWest.lat();

          // set multiple marker
          for (var i = 0; i < 10; i++) {
            // init markers
            var marker = new google.maps.Marker({
              position: new google.maps.LatLng(
                southWest.lat() + latSpan * Math.random(),
                southWest.lng() + lngSpan * Math.random()
              ),
              map: map,
              title: 'Click Me ' + i,
            });

            // process multiple info windows
            (function (marker, i) {
              // add click event
              google.maps.event.addListener(marker, 'click', function () {
                infowindow = new google.maps.InfoWindow({
                  content: 'Hello, World!!',
                });
                infowindow.open(map, marker);
              });
            })(marker, i);
          }
        })();
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
