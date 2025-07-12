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
        <h6 class="mb-0 text-uppercase">Tambah Data Informasi Loker</h6>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada yang salah.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('loker.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                            <select name="kategori_loker_id" class="form-select">
                                <option disabled selected>Pilih Kategori</option>
                                @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tb-fname" name="judul"
                                placeholder="Nama Loker" required>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="tb-lokasi" name="lokasi" placeholder="Lokasi Loker" required style="height: 100px"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tb-fname" name="gaji"
                                placeholder="gaji" required>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="tb-persyaratan" name="persyaratan" placeholder="Persyaratan" required style="height: 100px"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="tb-gambar" name="gambar"
                                placeholder="Gambar Loker" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.kategori_loker.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection