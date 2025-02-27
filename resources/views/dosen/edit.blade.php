@extends('layout')
@section('title','Edit Dosen')
@section('judul','Form Edit Dosen')
@section('isi')
    <form action="{{ route('dosen.update', $dosen->id_dosen) }}" method="post">
        @csrf
        <div class="form-group mb-2">
          <label>Nama Dosen</label>
      <input value="{{ $dosen->nama_dosen }}" type="text" name="nama_dosen" 
          class="form-control">
        </div>
        </div>
      
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>



    {{--  javascript untuk validasi form bootstrap di atas  --}}
    
    {{-- <script>// Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
              'use strict'
            
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              const forms = document.querySelectorAll('.needs-validation')
            
              // Loop over them and prevent submission
              Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                  if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                  }
            
                  form.classList.add('was-validated')
                }, false)
              })
            })()
    </script> --}}
@endsection                             