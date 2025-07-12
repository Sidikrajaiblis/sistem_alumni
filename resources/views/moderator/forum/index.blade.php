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
                            @foreach ($forum as $data)
                            <tr>
                                <td>{{ $data->user_id }}</td>
                                <td>{{ $data->kategori_forum_id }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->isi }}</td>
                                <td width="20%">
                                    <form action="{{ route('forum.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash3"></i>Hapus</button>
                                    </form>
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