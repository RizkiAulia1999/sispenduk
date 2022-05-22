@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">{{ __('EDIT DATA DUSUN') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/dusun/{{$dusuns->id}}" method="post" enctype="multipart/form-data" >
                        {{csrf_field()}}
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$dusuns->id}}"></br>
                        <div class="form-group"> 
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" required="required" name="nama" value="{{$dusuns->nama}}"></br>
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" class="form-control" required="required" name="rt" value="{{$dusuns->rt}}"></br>
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" required="required" name="rw" value="{{$dusuns->rw}}"></br>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>    
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection