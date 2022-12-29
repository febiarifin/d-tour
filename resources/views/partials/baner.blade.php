<section class="banner" id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2>Explore Destinasi Wisata Wonosobo</h2>
                    <span>{{ config('app.name') }} adalah sebuah website referensi buat anda untuk mecari destinasi wisata di Wonosobo.</span>
                    <div class="blue-button">
                        <a class="scrollTo" data-scrollTo="popular" href="#">Cari Wisata</a>
                    </div>
                </div>
                <div class="submit-form">
                    <form id="form-submit" action="{{ route('post.search') }}#popular" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-3 first-item">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Nama wisata..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-3 second-item">
                                <fieldset>
                                    <input name="location" type="text" class="form-control" id="location" placeholder="Lokasi wisata..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-3 third-item">
                                <fieldset>
                                    <select required name='category' onchange='this.form.()'>
                                        <option value="">Pilih Kategori...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Cari Wisata</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
