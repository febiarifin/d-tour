@extends('layouts.home')

@section('content')

@include('partials.baner')

<section class="featured-places" id="popular">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Daftar Tempat Wisata</span>
                    <h2>Rekomendasi Tempat Wisata</h2>
                </div>
            </div>
        </div>
        <div class="row col-12">

            @include('partials.postList')

        </div>

        <div style="margin-top: 50px; text-align:center">
            {{ $posts->links() }}
        </div>

    </div>
</section>

<section id="video-container">
    <div class="video-overlay"></div>
    <div class="video-content">
        <div class="inner">
            <span>Video Presentation</span>
            <h2>{{ config('app.name') }}</h2>
            <a href="https://www.youtube.com/watch?v=67n97lJcWdg" target="_blank"><i class="fa fa-play"></i></a>
        </div>
    </div>
    <video autoplay="" loop="" muted>
        <source src="{{ asset('venue-522/demo.mp4') }}" type="video/mp4" />
    </video>
</section>

@include('partials.footer')

@endsection
