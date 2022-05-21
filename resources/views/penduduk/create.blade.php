@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">{{ __('TAMBAH DATA PENDUDUK') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/penduduk" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" required="required" name="nik"><br>
                        </div>
                        <div class="form-group"> 
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" required="required" name="nama"></br>
                        </div>
                        <div class="form-group">
                            <label for="tanggallahir">Tempat, TanggalLahir</label>
                            <input type="text" class="form-control" required="required" name="tanggallahir"></br>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" required="required" name="alamat"></br>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" required="required" name="jeniskelamin"></br>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" required="required" name="pekerjaan"></br>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary float-right">Tambah Data</button>    
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection