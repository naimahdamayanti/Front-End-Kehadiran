<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Mahasiswa::orderBy('nim', 'desc')->get();
        return view('mahasiswa.index', [
            'mahasiswa' => Mahasiswa::all()
        ]);

        $response = Http::get('http://localhost:8080/Mahasiswa');
        $mahasiswa = $response->json();
        return view ('mahasiswa', ['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::get('http://localhost:8080/Mahasiswa');

        // Cek jika respons berhasil
        if ($response->successful()) {
            $prodis = $response->json(); // Ambil data JSON dari respons
        } else {
            $prodis = []; // Jika gagal, set data prodi kosong
        }

        // Kirim data prodi ke view
        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       

    // Kirim data ke API
    $response = Http::post('http://localhost:8080/Mahasiswa', [
         'npm' => $request->npm,
        'nama_mahasiswa' => $request->nama_mahasiswa,
        'nama_matkul' => $request->nama_matkul,
        'jurusan' => $request->jurusan,
        'prodi' => $request->prodi,
        'tahun_akademik' => $request->tahun_akademik,
    ]);

    // dd($response->json());

    // Cek respons dari API
    if ($response->successful()) {
        return redirect('/mahasiswa')->with('success', 'Data berhasil ditambahkan!');
    } else {
        // Tampilkan pesan error dari API
        $errorMessage = $response->json()['message'] ?? 'Gagal menambahkan data. Silakan coba lagi.';
        return back()->with('error', $errorMessage);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
