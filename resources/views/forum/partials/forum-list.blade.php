<div class="row">
    @foreach ($forum as $data)
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