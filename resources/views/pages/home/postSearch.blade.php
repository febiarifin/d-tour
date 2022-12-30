@extends('layouts.home')

@section('content')

@include('partials.baner')

<section class="featured-places" id="popular">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>{{ $title }}</span>
                    <h2>Daftar Tempat Wisata Hasil Pencarian Anda</h2>
                </div>
            </div>
        </div>
        <div class="row col-12">

            @include('partials.postList')

        </div>

    </div>
</section>

@endsection
