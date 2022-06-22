@extends('layouts.dashboard')

@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="card p-5">
                <h1>Welcome back, {{ Auth::user()->name }}!</h1>
            </div>
        </div>
    </main>
@endsection
