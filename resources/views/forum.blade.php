@extends('layouts.forum')
@section('content')
<!--start team-->
<section class="py-5 bg-section" id="Team">
    <div class="container py-4 px-4 px-lg-0">
        <div class="section-title text-center mb-3">
            <h1 class="mb-0 section-title-name">Forum Diskusi</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <select id="filter-kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategori_forums as $kategori)
                        <option value="{{ $kategori->id }}">
                            {{ $kategori->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="">
                    <!-- Button trigger modal -->
                    @auth
                    <button type="button" class="btn btn-grd-primary px-4" data-bs-toggle="modal"
                        data-bs-target="#FormModal">Tambah Forum Diskusi</button>
                    @endauth
                    <!-- Modal -->
                    <div class="modal fade" id="FormModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                                    <h5 class="modal-title">Tambah Forum Diskusi</h5>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <form action="{{ route('forum.store') }}" method="POST" class="row g-3">
                                            @csrf

                                            {{-- Hidden: user_id otomatis --}}
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                            {{-- Pilih Kategori Forum --}}
                                            <div class="col-md-12">
                                                <label for="kategori_forum_id" class="form-label">Kategori Forum</label>
                                                <select name="kategori_forum_id" id="kategori_forum_id" class="form-select" required>
                                                    <option disabled selected>Pilih Kategori</option>
                                                    @foreach ($kategori_forums as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Judul Forum --}}
                                            <div class="col-md-12">
                                                <label for="judul" class="form-label">Judul Forum</label>
                                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul forum" required>
                                            </div>

                                            {{-- Isi Forum --}}
                                            <div class="col-md-12">
                                                <label for="isi" class="form-label">Isi Forum</label>
                                                <textarea name="isi" id="isi" class="form-control" placeholder="Isi forum..." rows="4" required></textarea>
                                            </div>

                                            {{-- Tombol Submit --}}
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <button type="submit" class="btn btn-grd-danger px-4">Simpan</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>

        <div class="row">
            @if ($forums->isEmpty())
            <div class="col-12">
                <div class="alert alert-info text-center rounded-4">
                    Belum ada forum diskusi yang tersedia.
                </div>
            </div>
            @endif
            <div class="container" id="forum-container">
                @foreach ($forums as $data)
                <div class="col-12 col-xl-6">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <a class="d-flex align-items-center gap-3">
                                <div class="customer-pic">
                                    <img src="{{ asset('storage/' . $data->user->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                                </div>
                                <p class="mb-0 fw-bold">{{ $data->user->name }}</p>
                            </a> <br>

                            <p class="mb-0 fw-bold">Kategori :{{ $data->kategoriForum->nama ?? '-' }}</p>
                            <h5 class="mb-0">{{ $data->judul }}</h5>
                            <p class="my-3">{{ $data->isi }}. </p>
                            <div class="">
                                <!-- Button trigger modal -->
                                <a href="{{ route('forumid', $data->id) }}" class="btn btn-grd-primary px-4">Lihat detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div><!--end row-->
    </div>
</section>
<!--end team-->

<script>
    let kategoriId = '';

    function loadForum() {
        let url = '/forum/data';
        if (kategoriId !== '') {
            url += '?kategori=' + kategoriId;
        }

        fetch(url)
            .then(response => response.text())
            .then(html => {
                document.getElementById('forum-container').innerHTML = html;
            })
            .catch(error => {
                console.error('Gagal fetch forum:', error);
            });
    }

    // Load pertama kali
    loadForum();

    // Auto refresh tiap 5 detik
    setInterval(loadForum, 5000);

    // Ganti filter kategori
    document.getElementById('filter-kategori').addEventListener('change', function() {
        kategoriId = this.value;
        loadForum(); // Langsung load ulang sesuai kategori
    });
</script>

@endsection