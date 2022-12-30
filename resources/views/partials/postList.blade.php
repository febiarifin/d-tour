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
                        <a href="{{ route('post.detail', $post->slug) }}">Detail Wisata</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
