<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use App\Models\Pesanan;

class Kasir extends Controller
{
    //
    public function index()
    {
        return view('kasir/name');
    }
    public function makeorder(Request $request)
    {
        $ren=array(
            0=>array(
                'produk'=>'produk 3',
                'much'=>'14',
                'price'=>14000,
            ),
            1=>array(
                'produk'=>'produk1',
                'much'=>'155',
                'price'=>1860000,
            ),
        );
        // dd(json_encode($ren),json_decode(json_encode($ren)));
        $nama = $request->input('nama');
        $data['nama'] = $nama;
        $data['data']=DB::table('Item_sell')->get();
        // dd($data);
        return view('kasir/itemv2', ['data' => $data]);
    }
    public function jsoncek(Request $request)
    {
        // "produk":"produk 3","much":"14"
        $data=array(
            'id_petugas'=>1,
            'pesanan'=>$request->input('data'),
            'total_harga'=>$request->input('total'),
            'crn'=>$request->input('crn'),
            'nama_pemesan'=>$request->input('nama'),
        );

        $flight = Pesanan::create($data);


        dd($data);
        // dd($ren);
        // dd(json_decode($ren));
    }
}
