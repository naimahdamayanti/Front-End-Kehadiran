<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        return view('dosen.create', ['dosen' => $dosen]);

    }

    public function store(Request $request)
    {
        $request->validate([
           'id_dosen' => 'required|int',
            'nama_dosen' => 'required|string|max:255',
        ]);

        Dosen::create([
            'id_dosen' => $request->id_dosen,
            'nama_dosen' => $request->nama_dosen,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function show($id)
    {
        // $dosen = Dosen::findOrFail($id);
        // return view('dosen.show', compact('dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', ['dosen' => $dosen]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dosen' => 'required',
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'nama_dosen' => $request->nama_dosen,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Dosen::findOrFail($id)->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
