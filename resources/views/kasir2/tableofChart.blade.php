@extends('kasir2.master')
@section('content')
    <div id="appCapsule">
        <div class="container">
            <div class="section full mt-1 mb-2">
                <div class="section-title">Data Pelanggan Kamu</div>
                <div class="content-header mb-05">
                    Berikut adalah data pelanggan kamu yang sudah kamu layani <code>Nama Petugas :
                        {!! Auth::user()->name !!}</code>
                </div>
                <div class="wide-block p-0">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Tanggal Pemesanan</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{ $item->nama_pemesan }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><a href="{{ url('/struck?id=' . $item->id) }}" class="btn btn-success">Lihat
                                                Struck</a>
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
@endsection
