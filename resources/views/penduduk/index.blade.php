@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('DATA PENDUDUK ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <!--fitur search data-->
                     <div class="row">
                        <form action="/penduduk" class="form-inline" method="get">
                            <gitdiv class="form-group mx-sm-3 mb-3">
                                <input name="keyword" type="text" class="form-control" placeholder="Name">
                            </gitdiv>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-3">Cari</button>
                            </div> 
                        </form>
                    </div>

                    <a href="/penduduk/create" class="btn btn-primary">Tambah Data</a> 
                    <br><br>
                    
                     <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat,TanggalLahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pekerjaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($penduduks as $p)
                                    <tr>
                                        <td>{{ $p->id}}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->tanggallahir }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->jeniskelamin }}</td>
                                        <td>{{ $p->pekerjaan }}</td>
                                        <td>
                                        <form action="/penduduk/{{$p->id}}" method="post"> 
                                            <a href="/penduduk/{{$p->id}}/edit" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                        </form>     
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table> 
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection