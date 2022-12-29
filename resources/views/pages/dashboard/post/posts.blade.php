@extends('layouts.dashboard')

@section('content')
    <main class="content">
        <h1 class="h3 mb-3">{{ $title }}</h1>
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
                        <span class="align-middle"> <i class="fa-solid fa-plus"></i> Add Post</span></a>

                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>NO</th>
                            <th>TEMPAT</th>
                            <th>LOKASI</th>
                            <th>KATEGORI</th>
                            <th>MAPS</th>
                            <th>GAMBAR</th>
                            <th>AKSI</th>
                        </tr>

                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->location }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td><a href="{{ $post->maps_url }}" target="_blank">show</a></td>
                                <td><a href="{{ url($post->image) }}" target="_blank">show</a></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        &nbsp;
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                            @method('delete')
                                            @csrf

                                            <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="confirmDelete()"><i class="bi bi-trash"></i>
                                                Delete</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
        {{ $posts->links() }}
    </main>

    <script type="text/javascript">
        function confirmDeletePost() {
            event.preventDefault();
            var form = event.target.form;

            Swal.fire({
                title: 'Yakin artikel dihapus ?',
                text: 'Artikel akan dihapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }

        function confirmEditStatusPosting() {
            event.preventDefault();
            var form = event.target.form;

            Swal.fire({
                title: 'Yakin posting artikel ?',
                text: 'Artikel akan ditampilkan pada halaman website',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }

        function confirmEditStatusDraft() {
            event.preventDefault();
            var form = event.target.form;

            Swal.fire({
                title: 'Yakin draft artikel ?',
                text: 'Artikel akan dihilangkan pada halaman website',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
@endsection
