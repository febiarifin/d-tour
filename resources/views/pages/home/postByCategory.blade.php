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

            @include('partials.postList')

        </div>

        <div style="margin-top: 50px; text-align:center">
            {{ $posts->links() }}
        </div>

    </div>
</section>

@endsection
