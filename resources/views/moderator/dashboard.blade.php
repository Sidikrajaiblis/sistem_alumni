@extends('layouts.admin')

@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">forum</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Informasi Forum</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Informasi Forum</h6>
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <a href="{{ route('forum.create') }}" class="btn btn-primary tombol-tambah">Tambah Informasi forum</a>
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Kategori Id</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forums as $forum)
                            <tr>
                                <td>{{ $forum->user->name }}</td>
                                <td>{{ $forum->kategoriForum->nama }}</td>
                                <td>{{ $forum->judul }}</td>
                                <td>{{ Str::limit($forum->isi, 100) }}</td>
                                <td>
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
                                    <a href="{{ route('forum.detail', $forum->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                            @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection