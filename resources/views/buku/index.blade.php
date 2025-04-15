@extends('components.master')
@section('content')
    <div class= "container mt-4 mb-4">
        <div class= "card">
            <div class="card-body">

                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="card-title">Data Buku </h3>
                    </div>
                    <div class="flex-shrink-1">
                        <a href="{{ route('buku.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>

                <table class="table" id="mytable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">judul buku</th>
                            <th scope="col">tahun terbit buku</th>
                            <th scope="col">penulis</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Opsi</th>
                        </tr>
                        @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->tahun_terbit }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td>{{ $item->deskripsi }}</td>

                                <td>
                                    <a href="{{ route('buku.show', $item->id) }}" class="btn btn-sm btn-primary">lihat</a>


                                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <button data-id="{{ $item->id }}"
                                        class="btn btn-sm btn-danger delete-btn">Hapus</button>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="5" class="text-center">Data tidak tersedia</td>
                            </tr>
                        @endforelse

                    </thead>
                    <tbody>

                </table>
            </div>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll(".delete-btn").forEach((button) => {
                    button.addEventListener("click", function(event) {
                        event.preventDefault();

                        let id = this.getAttribute("data-id");
                        let deleteUrl = "{{ route('buku.destroy', ':id') }}".replace(':id', id);

                        Swal.fire({
                            title: "Kamu yakin?",
                            text: "Kamu akan menghapus data dan tidak bisa dikembalikan!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Iya, hapus!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Membuat form dinamis untuk mengirimkan permintaan DELETE
                                let form = document.createElement('form');
                                form.method = 'POST';
                                form.action = deleteUrl;

                                // Menambahkan CSRF token
                                let csrfToken = document.createElement('input');
                                csrfToken.type = 'hidden';
                                csrfToken.name = '_token';
                                csrfToken.value = "{{ csrf_token() }}";
                                form.appendChild(csrfToken);

                                // Menambahkan input untuk method DELETE
                                let methodField = document.createElement('input');
                                methodField.type = 'hidden';
                                methodField.name = '_method';
                                methodField.value = 'DELETE';
                                form.appendChild(methodField);

                                // Menambahkan form ke body dan submit
                                document.body.appendChild(form);
                                form.submit(); // Mengirimkan form
                            }
                        });
                    });
                });
            });
        </script>



        <script>
            let table = new DataTable('#mytable');
        </script>
    @endsection
