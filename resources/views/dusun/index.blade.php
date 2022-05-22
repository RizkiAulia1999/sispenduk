@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('DATA DUSUN ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <!--fitur search data-->
                     <div class="row">
                        <form action="/dusun" class="form-inline" method="get">
                            <gitdiv class="form-group mx-sm-3 mb-3">
                                <input name="keyword" type="text" class="form-control" placeholder="Name">
                            </gitdiv>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-3">Cari</button>
                            </div> 
                        </form>
                    </div>

                    <a href="/dusun/create" class="btn btn-primary">Tambah Data</a> 
                    <br><br>
                    
                     <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dusuns as $d)
                                    <tr>
                                        <td>{{ $d->id}}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->rt }}</td>
                                        <td>{{ $d->rw }}</td>
                                        <td>
                                        <form action="/dusun/{{$d->id}}" method="post"> 
                                            <a href="/dusun/{{$d->id}}/edit" class="btn btn-warning">Edit</a>
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