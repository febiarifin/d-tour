@extends('layouts.dashboard')

@section('content')
    <main class="content">
        <h1 class="h3 mb-3">{{ $title }}</h1>

        <div class="container-fluid p-0">
            <form action="{{ route('postUpdate') }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2">
                                    <label for="">Nama tempat wisata</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Masukkan judul artikel" value="{{ $post->title }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="">Kategori</label>
                                    <select class="form-select @error('category') is-invalid @enderror" name="category"
                                        aria-label="Default select example" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}"
                                                @if ($category->name === $post->category) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="">Lokasi wisata</label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') is-invalid @enderror"
                                        placeholder="Masukkan lokasi" value="{{ $post->location }}" required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="">Url google maps</label>
                                    <input type="text" name="maps_url"
                                        class="form-control @error('maps_url') is-invalid @enderror"
                                        placeholder="Masukkan url google maps" value="{{ $post->maps_url }}" required>
                                    @error('maps_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card" style="height: 315px;">
                            <div class="card-body">
                                <label for="">URL gambar</label>
                                {{-- <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" placeholder="choose file"
                                    onchange="previewFile()"> --}}
                                <input type="text" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    placeholder="Pastekan url gambar" onchange="previewFile()"
                                    value="{{ $post->image }}">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-1 mb-1">
                                    <center>
                                        <img class="file-preview mt-3" src="{{ asset($post->image) }}" alt="Image post"
                                            height="155" width="260">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <label for="description" class="form-label">Deskripsi</label>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <textarea name="description" cols="5" rows="5" class="form-control" required>{{ $post->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><span class="align-middle"> <i
                            class="fa-solid fa-floppy-disk"></i> Save</span></button>
            </form>
        </div>
    </main>

    <script>
        function previewFile() {
            const file = document.querySelector('#image');
            const filePreview = document.querySelector('.file-preview');
            filePreview.style.display = 'block';
            // const oFReader = new FileReader();
            // oFReader.readAsDataURL(file.files[0]);
            // oFReader.onload = function(oFREvent) {
            //     filePreview.src = oFREvent.target.result;
            // }
            filePreview.src = file.value;
        }
    </script>
@endsection
