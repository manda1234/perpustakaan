@extends('components.master')

@section('content')
    <div class="container">
        <h1>Dashboard Perpustakaan</h1>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Data Buku
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center"
                        style="height: 200px;">
                        <p class="text-center">Kelola dan lihat data buku di perpustakaan.</p>
                        <a href="{{ route('buku.index') }}" class="btn btn-primary mt-3">Lihat Data Buku</a>
                    </div>
                </div>
            </div>
            <!-- Bisa menambahkan menu lain di sini -->
        </div>
    </div>
@endsection
