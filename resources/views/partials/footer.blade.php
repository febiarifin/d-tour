<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="about-veno">
                    <div class="logo">
                        <img src="{{ asset('venue-522/img/logo-small.png') }}" alt="Venue Logo">
                    </div>
                    <p>{{ env('APP_DESCRIPTION') }}</p>
                    <ul class="social-icons">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="useful-links">
                    <div class="footer-heading">
                        <h4>Kategori Wisata</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                               @foreach ($categories as $category)
                               <li><a href="{{ route('post.category', $category->slug) }}"><i class="fa fa-stop"></i>{{ $category->name }}</a></li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contact-info">
                    <div class="footer-heading">
                        <h4>Informasi Kontak</h4>
                    </div>
                    <ul>
                        <li><span>Phone:</span><a href="#">+62 888 668 8732</a></li>
                        <li><span>Email:</span><a href="#">hi@dtour.com</a></li>
                        <li><span>Address:</span><a href="#">dtour.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
