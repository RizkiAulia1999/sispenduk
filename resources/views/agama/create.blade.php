@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">{{ __('TAMBAH DATA AGAMA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/agama" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group"> 
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" required="required" name="agama"></br>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Penduduk</label>
                            <input type="text" class="form-control" required="required" name="jumlah"></br>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary float-right">Simpan</button>    
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection