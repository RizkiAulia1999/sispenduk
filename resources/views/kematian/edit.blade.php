@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">{{ __('EDIT DATA KEMATIAN') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/kematian" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <select class="form-control" name="nik">
                            @foreach($penduduks as $p)
                                <option value="{{$p->id}}">
                                {{ $p->nik }}
                                </option>
                            @endforeach
                            </select></br>
                        </div>
                        <div class="form-group">
                            <label for="umur">UMUR</label>
                            <input type="text" class="form-control" required="required" name="umur"></br>
                        </div>
                        <div class="form-group">
                            <label for="tanggalkematian">Tanggal Kematian</label>
                            <input type="date" class="form-control" required="required" name="tanggalkematian"></br>
                        </div>
                        <div class="form-group">
                            <label for="tempatkematian">Tempat Kematian</label>
                            <input type="text" class="form-control" required="required" name="tempatkematian"></br>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary float-right">Simpan</button>    
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection