@extends('layouts.home')

@section('content')

<section class="banner" id="top" style="background-image: url({{asset($post->image)}}); background-color:black">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2>{{ $post->title }}</h2>
                    <span>{{ $post->description }}</span>
                    <div style="color: white; margin-top:50px;margin-bottom:50px;">
                        <h5>#{{ $post->category->name }}</h5>
                        <h5>{{ $post->location }}</h5>
                    </div>
                    <div class="blue-button">
                        <a class="scrollTo" data-scrollTo="popular" href="{{ $post->maps_url }}" target="_blank">Lihat Maps</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="comment-box">
    <div id="disqus_thread"></div>
</section>

<script>
    (function() {
    var d = document, s = d.createElement('script');
    s.src = 'https://dtour-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


@endsection
