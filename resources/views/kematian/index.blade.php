@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('DATA KEMATIAN  ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/kematian/create" class="btn btn-primary">Tambah Data</a> 
                    <br><br>
                    
                     <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>NIK</th>
                                        <th>Umur</th>
                                        <th>Tanggal Kematian</th>
                                        <th>Tempat Kematian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    @foreach($kematians as $k)
                                    <tr>
                                        <td>{{ $no++}}</td>
                                        <td>{{ $k->penduduks->nik }}</td>
                                        <td>{{ $k->umur }}</td>
                                        <td>{{ $k->tanggalkematian}}</td>
                                        <td>{{ $k->tempatkematian }}</td>
                                        <td>
                                        <form action="/kematian/{{$k->id}}" method="post"> 
                                            <a href="/kematian/{{$k->id}}/edit" class="btn btn-warning">Edit</a>
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