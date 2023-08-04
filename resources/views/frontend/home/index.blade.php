@extends('frontend.layouts.master')

@section('frontend_content')
    <!-- Trending news  carousel-->
    @include('frontend.home.trending-news')
    <!-- End Trending news carousel -->

    <!-- Hero slider news -->
    @include('frontend.home.hero-slider')
    <!-- End Hero slider news -->

    <div class="large_add_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="large_add_banner_img">
                        <img src="{{ asset('public/template/frontend/images/placeholder_large.jpg') }}" alt="adds">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular news category -->
    @include('frontend.home.main-news')
    <!-- End Popular news category -->
@endsection
