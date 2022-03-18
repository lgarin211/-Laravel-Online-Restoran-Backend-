@extends('kasir.master.master')
    @section('item')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
            <form action="{{url('/makeorder')}}" method="get">
                <input type="text" class="form-control" name="nama" placeholder="Silahkan Masukan Nama Pemesan">
                <button type="submit" class="btn btn-primary">Buat</button>
            </form>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
    @endsection
