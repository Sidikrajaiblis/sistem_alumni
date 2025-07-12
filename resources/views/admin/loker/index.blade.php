@extends('layouts.admin')
@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Loker</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Informasi Loker</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Informasi Loker</h6>
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
                        <a href="{{ route('loker.create') }}" class="btn btn-primary tombol-tambah">Tambah Informasi Loker</a>
                        <thead>
                            <tr>
                                <th>Kategori Id</th>
                                <th>judul</th>
                                <th>Lokasi</th>
                                <th>Gaji</th>
                                <th>persyaratan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loker as $data)
                            <tr>
                                <td>{{ $data->kategori_loker_id }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->lokasi }}</td>
                                <td>{{ $data->gaji }}</td>
                                <td>{{ $data->persyaratan }}</td>
                                <td>
                                    @if($data->gambar)
                                        <img src="{{ asset('storage/' . $data->gambar) }}" alt="Gambar Loker" width="80">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td width="20%">
                                    <a href="{{ route('loker.edit', $data->id) }} " class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('loker.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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