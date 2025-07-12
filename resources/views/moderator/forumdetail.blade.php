@extends('layouts.admin')

@section('content')

<section>
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Detail Forum</h6>
            <hr>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            @endif
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <a class="d-flex align-items-center gap-3">
                                <div class="customer-pic">
                                    <img src="{{ asset('storage/' . $forum->user->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                                </div>
                                <p class="mb-0 fw-bold">{{ $forum->user->name }}</p>
                            </a>
                            <h3 class="mb-2">{{ $forum->judul }}</h3>
                            <p>{{ $forum->isi }}</p>

                            <form action="{{ route('moderator.forum.approve', $forum->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="{{ route('moderator.forum.reject', $forum->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>

                        </div> <!-- tutup modal-body -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection