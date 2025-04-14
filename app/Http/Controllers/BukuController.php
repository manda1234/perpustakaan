<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Buku;
use App\Http\Requests\BukuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function index()
    {
        try {
            $data = Buku::orderBy('created_at', 'desc')->get(); // Ambil semua data buku
            return view('buku.index', compact('data'));
        } catch (\Throwable $th) {
            Log::error([
                'Line' => $th->getLine(),
                'Message' => $th->getMessage(),
                'File' => $th->getFile(),
            ]);
            return $th->getMessage();
        }
    }

    public function create()
    {
        return view('Buku.create');
    }

    public function store(BukuRequest $request)
    {
        Buku::create([
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {
            $buku = Buku::find($id);

            if (!$buku) {
                return back()->with('error', 'Buku tidak ditemukan');
            }

            return view('buku.edit', compact('buku'));
        } catch (\Throwable $th) {
            Log::error([
                'line' => $th->getLine(),
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
            ]);

            return back()->with('error', 'Terjadi kesalahan saat menampilkan data buku.');
        }
    }

    public function update(BukuRequest $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Pertahankan salah satu
    public function show($id)
    {
        $buku = Buku::find($id);
        return view('buku.show', compact('buku'));
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return redirect()->route('buku.index')->with(
                'error',
                'Buku tidak ditem
            akan',
            );
        }
        $buku->delete();
        return redirect()->route('buku.index')->with(
            'success',
            'Buku berhasil dihapus
            ',
        );
    }
}
