@extends('layout')
@section('title','Mata Kuliah')
@section('judul','Mata Kuliah')
@section('isi')
@if (Session::has('create'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data Berhasil Di Tambah</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if (Session::has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Data Berhasil Di Hapus!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (Session::has('update'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Berhasil Di Edit!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="container">
<a href="{{ route('matkul.create')}}">
  <button class="btn btn-icon btn-3 btn-danger" type="button">
      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
    <span class="btn-inner--text">Tambah Mata Kuliah</span>
  </button>
</a>
    <table class="table table-striped table-sm">
          <thead>
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID Mata Kuliah</th>
                 <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Semester</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matkul as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id_matkul }}</td>
                <td>{{ $data->nama_matkul }}</td>
                <td>{{ $data->sks }}</td>
                <td>{{ $data->semester }}</td>
                <td>
                      <a href="{{ url('matkul/edit/'.$data->id) }}">
                          <button class="btn btn-primary">EDIT</button>
                      </a>
                      <a href="{{ url('matkul/destroy/'.$data->id)}}">
                        <button class="btn btn-danger">HAPUS</button>
                    </a>
                  </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection