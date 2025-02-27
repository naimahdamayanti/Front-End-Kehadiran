<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index(){
        $matkul = Matkul::all();
        return view('matkul.index', compact('matkul'));
    }

    public function create(){
        return view('matkul.create');
    }

    public function store(Request $request){

        request()->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required',            
            'sks' => 'required',            
            'semester' => 'required',
        ]);

        $matkul = Matkul::create($request->all());
        return redirect()->route('matkul.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $matkul = Matkul::find($id);
        return view('matkul.edit', compact('matkul'));
    }
}
