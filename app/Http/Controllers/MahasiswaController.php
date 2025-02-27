<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'nama_matkul' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'tahun_akademik' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create($validasi);
        if($mahasiswa){
            return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
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
