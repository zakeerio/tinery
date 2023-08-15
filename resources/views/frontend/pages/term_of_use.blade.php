@extends('frontend.layouts.app')

@section('title', $pages->title)
@section('meta_keywords', $pages->seo_keywords)
@section('meta_description', $pages->seo_description)

@if ($pages->file != "")
    @php
        $file = asset('frontend/img/'.$pages->file);
    @endphp
@else
    @php
        $file = asset('frontend/images/LOGO.png')
    @endphp
@endif


@section('file', ($file))




@section('content')

    <section class="hero-sections">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="hero-content left-margin">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between  ">
                                    <div class="col-lg-8">
                                        <h1 class="trip-h1" >{{ $pages->title}}</h1>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-lg-12 mb-3 bright-70">
                                        @if ($pages->file != "")
                                        <img src="{{ asset('frontend/img/'.$pages->file) }}" alt="" class="wed-img">
                                        @else
                                        <img src="{{ asset('frontend/images/annie-spratt.jpg') }}" alt="" class="wed-img">
                                        @endif
                                    </div>
                                </div>
                                <div class="content mt-4">
                                    @php
                                        echo $pages->description;
                                    @endphp
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
       
    </section>

@endsection
