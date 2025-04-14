@extends('components.master')

@section('content')
<div class="container mt-4 mb-4 d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-body">
            <h4 class="card-title text-center">Detail Buku</h4>

            <div class="text-center">
                <h5 class="text-bold mt-3">{{ $buku->judul }}</h5>
                <p class="text-secondary">Tahun Terbit: {{ $buku->tahun_terbit }}</p>
                <p>Penulis: {{ $buku->penulis }}</p>
                <p>Deskripsi: {{ $buku->deskripsi }}</p>
            </div>

            <hr>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
