@extends('layouts.home')

@section('content')

@include('partials.baner')

<section class="featured-places" id="popular">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Tempat Wisata Kategori {{ $category->name }}</span>
                    <h2>Daftar Tempat Wisata Dengan Kategori {{ $category->name }}</h2>
                </div>
            </div>
        </div>
        <div class="row col-12">

            @foreach ($posts as $post)
            <div class="col-md-4" style="margin-bottom: 25px;">
                <div class="featured-item">
                    <div class="thumb">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    </div>
                    <div class="down-content">
                        <h4>{{ $post->title }}</h4>
                        <span>{{ $post->category->name }}</span>
                        <p>{{ Str::substr($post->description,0,80) }}...</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-button">
                                    <a href="#">Detail Wisata</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top: 50px; text-align:center">
            {{ $posts->links() }}
        </div>

    </div>
</section>

@endsection
