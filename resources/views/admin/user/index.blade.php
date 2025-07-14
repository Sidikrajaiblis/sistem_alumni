@extends('layouts.admin')
@section('content')
<main class="main-wrapper">
    <div class="main-content">

        <h6 class="mb-0 text-uppercase">Informasi User</h6>
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
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3">
                                        <div class="customer-pic">
                                            <img src="{{ asset('storage/' . $data->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                                        </div>
                                        <p class="mb-0 fw-bold">{{ $data->name }}</p>
                                    </a>
                                </td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    @if($data->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                    @elseif($data->status === 'banned')
                                    <span class="badge bg-danger">Banned</span>
                                    @endif
                                </td>
                                <td width="20%">
                                    @if($data->status === 'active')
                                    <form action="{{ route('user.ban', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning">🚫 Ban</button>
                                    </form>
                                    @elseif($data->status === 'banned')
                                    <form action="{{ route('user.unban', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success">✔️ Unban</button>
                                    </form>
                                    @endif
                                    <form action="{{ route('user.destroy', $data->id) }}" method="POST" style="display:inline;">
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