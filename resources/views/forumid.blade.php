@extends('layouts.forum')
@section('content')
<!--start team-->
<section class="py-5 bg-section" id="Team">
    <div class="container py-4 px-4 px-lg-0">
        <div class="section-title text-center mb-5">
            <h1 class="mb-0 section-title-name"> Detail Forum</h1>
        </div>

        <div class="row">
            @session('success')
            <div class="col-12">
                <div class="alert alert-success text-center rounded-4">
                    {{ session('success') }}
                </div>
            </div>
            @endsession
            @if (session('error'))
            <div class="col-12">
                <div class="alert alert-danger text-center rounded-4">
                    {{ session('error') }}
                </div>
            </div>
            @endif
            <div class="modal-content">
                <div class="card-body">
                    <a class="d-flex align-items-center gap-3">
                        <div class="customer-pic">
                            <img src="{{ asset('storage/' . $user->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                        </div>
                        <p class="mb-0 fw-bold">{{ $user->name }}</p>
                    </a>
                    <h3 class="mb-2">{{ $forums->judul }}</h3>
                    <p>{{ $forums->isi }}</p>
                    <hr>

                    <h5 class="mt-4">Tinggalkan Komentar</h5>
                    @auth
                    <form action="{{ route('komentar.store', $forums->id) }}" method="POST">
                        @csrf
                        <input type="text" name="isi" id="" class="form-control mt-2" placeholder="Tulis komentar...">
                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                    </form>
                    @endauth
                    @guest
                    <p class="text-muted">Login dulu buat komentar.</p>
                    <a href="{{ route('login') }}" class="btn btn-grd btn-grd-primary raised d-flex align-items-center rounded-5 gap-2 px-4">Login</a>
                    @endguest
                    <hr>
                    <h5>Komentar:</h5>
                    @forelse ($forums->komentar as $komentar)
                    @if ($komentar->deleted_at && $komentar->deleted_by == null)
                    @continue
                    @endif

                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ asset('storage/' . $komentar->user->foto) }}" class="rounded-circle" width="30" height="30" alt="">
                        <strong>{{ $komentar->user->name }}</strong>
                    </div>

                    @if ($komentar->deleted_at && $komentar->deleted_by !== null)
                    <em class="text-danger">Komentar telah dihapus oleh moderator.</em>
                    @else
                    <p class="mb-0">{{ $komentar->isi }}</p>

                    @if (Auth::check() && (Auth::id() == $komentar->user_id || Auth::user()->role == 'moderator'))
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $komentar->id }}">Hapus</button>
                    <form id="form-delete-{{ $komentar->id }}" action="{{ route('komentar.destroy', $komentar->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif
                    @endif

                    <small class="ms-5 text-muted">{{ $komentar->created_at->diffForHumans() }}</small><br>
                    <hr>
                    @empty
                    <p class="text-muted">Belum ada komentar.</p>
                    @endforelse

                    <br>

                </div> <!-- tutup modal-body -->
            </div>
        </div><!--end row-->
    </div>
</section>
<!--end team-->
@endsection