<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button id="primary-nav-button" type="button">Menu</button>
                <a href="/"><div class="logo">
                    <img src="{{ asset('venue-522') }}/img/logo-new.png" alt="Venue Logo">
                </div></a>
                <nav id="primary-nav" class="dropdown cf">
                    <ul class="dropdown menu">
                        <li class='active'><a href="/">Home</a></li>

                        @foreach ($categories as $category)
                        <li><a href="{{ route('post.category', $category->slug) }}#popular">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </nav><!-- / #primary-nav -->
            </div>
        </div>
    </div>
</header>
