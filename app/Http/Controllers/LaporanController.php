<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
        'nama_pelapor' => 'required|string|max:100',
        'email_pelapor' => 'nullable|email|max:100',
        'kontak' => 'nullable|string|max:20',
        'nama_barang' => 'required|string|max:100',
        'lokasi' => 'required|string|max:150',
        'tingkat_urgensi' => 'required|in:Rendah,Sedang,Tinggi',
        'deskripsi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
    ], [
        // Custom error messages (Bahasa Indonesia)
        'nama_pelapor.required' => 'Nama pelapor wajib diisi.',
        'nama_pelapor.max' => 'Nama pelapor maksimal 100 karakter.',
        'email_pelapor.email' => 'Format email tidak valid.',
        'kontak.max' => 'Nomor kontak maksimal 20 karakter.',
        'nama_barang.required' => 'Nama barang yang rusak wajib diisi.',
        'lokasi.required' => 'Lokasi wajib diisi.',
        'tingkat_urgensi.required' => 'Tingkat urgensi wajib dipilih.',
        'tingkat_urgensi.in' => 'Tingkat urgensi tidak valid.',
        'deskripsi.required' => 'Deskripsi kerusakan wajib diisi.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
    ]);
    }
}
