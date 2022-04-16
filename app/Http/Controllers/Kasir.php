<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Exports\PesananExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class Kasir extends Controller
{
    //
    public function cliend()
    {
        return view('kasir/name');
    }

    public function index()
    {
        return view('kasir2/produk');
    }

    public function export()
    {
        return Excel::download(new PesananExport, 'users.xlsx');
    }

    public function makeorder(Request $request)
    {   
        if (!empty($request->id_produk)) {
            $nama = $request->input('nama');
        }else{
            $nama='no name';
        }
        $data['nama'] = $nama;
        $data['data']=DB::table('Item_sell')->inRandomOrder()->get();
        return view('kasir2/produk', ['data' => $data]);
    }

    public function make_struck()
    {
        $id=$_GET['id'];
        $data['data']=DB::table('Pesanan')->where('id',$id)->first();
        return view('kasir2/struck', ['data' => $data]);
    }

    public function chart()
    {   
        $data['data']=DB::table('Item_sell')->inRandomOrder()->get();
        return view('kasir2/produkChart', ['data' => $data]);
    }

    public function addorder(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama');
        $harga = $request->input('harga');
        $jumlah = $request->input('jumlah');
        $total = $request->input('total');
        $data['id'] = $id;
        $data['nama'] = $nama;
        $data['harga'] = $harga;
        $data['jumlah'] = $jumlah;
        $data['total'] = $total;
        return view('kasir2/produk', ['data' => $data]);
    }

    public function list_struck()
    {
        $data['data']=DB::table('Pesanan')->where('id_petugas','=',Auth::user()->id)->orderby('created_at','desc')->get();
        return view('kasir2/tableofChart', $data);
    }
    

    public function jsoncek(Request $request)
    {
        $data=array(
            'id_petugas'=>Auth::user()->id,
            'pesanan'=>$request->input('data'),
            'total_harga'=>$request->input('total'),
            'crn'=>$request->input('crn'),
            'nama_pemesan'=>$request->input('nama'),
        );

        $flight = Pesanan::create($data);

        return redirect('/struck?id='.$flight->id);
        // $this->endcoredata($data);
    }

    private function endcoredata($data='null')
    {
        dd($data);
    }
}
