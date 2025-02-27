@extends('layout')
@section('title','Input Mahasiswa')
@section('judul','Form Input Mahasiswa')
@section('isi')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('mahasiswa.store')}}" method="post">
        @csrf
        <div class="form-group mb-2">
            <label>NPM</label>
            <input type="text" name="npm" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Mata Kuliah</label>
            <input type="text" name="nama_matkul" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Jurusan</label>
            <input type="text" name="jurusan" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
                    <label for="validationCustom01" class="form-label">Prodi</label>
                    <select value=" {{ old('prodi')}}" class="form-control " name="prodi">
                    <option value="">--Pilih Prodi--</option>
                    <option value="TI">D3 Teknik Informatika</option>
                    <option value="TE">D3 Teknik Elektro</option>
                    <option value="TL">D3 Teknik Listrik</option>
                    <option value="TM">D3 Teknik Mesin</option>
                    <option value="ALKS">D4 ALKS</option>
                    <option value="RKS">D4 RKS</option>
                    <option value="TRM">D4 TRM</option>
                    <option value="MEKATRO">D4 Mekatronika</option>
                    <option value="TRET">D4 TRET</option>
                    <option value="PPA">D4 PPA</option>
                    <option value="TPPL">D4 TPPL</option>
                    </select>
            </div>
        <div class="form-group mb-2">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" type="text"  class="form-control">
        </div>
            
            <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
