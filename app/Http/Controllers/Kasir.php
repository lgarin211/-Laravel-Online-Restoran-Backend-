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
    public function idopin($data)
    {
        // dd($data);
        $ipqo=json_decode($data->pesanan);
        // dd($ipqo);
        foreach ($ipqo as $key => $value) {
            $produk[$key]= $value->produk;
            $priceone[$key]= $value->priceone;
            $quantity[$key]= $value->quantity;
        }
        $produk[$key+1]= 'Tax 10%';
        $priceone[$key+1]= $data->total_harga*10/100;
        $quantity[$key+1]= '1';
        $va           = '0000001221723861'; //get on iPaymu dashboard
        $secret       = 'SANDBOXEF649FC8-F90F-4E29-9C47-B33167239B9A-20220326121000'; //get on iPaymu dashboard
        $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; //url
        $method       = 'POST'; //method

        //Request Body//
        $body['product']    = $produk;
        $body['qty']        = $quantity;
        $body['price']      = $priceone;
        $body['returnUrl']  = 'https://startcode_001-yecebot863878792.codeanyapp.com/struck?id='.$data->id;
        $body['cancelUrl']  = 'https://startcode_001-yecebot863878792.codeanyapp.com/cencel';
        $body['notifyUrl']  = 'https://startcode_001-yecebot863878792.codeanyapp.com/struck?id='.$data->id;
        //End Request Body//

        //Generate Signature
        // *Don't change this
        $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody  = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
        $signature    = hash_hmac('sha256', $stringToSign, $secret);
        $timestamp    = Date('YmdHis');
        //End Generate Signature

        // dump($signature);
        $ch = curl_init($url);
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'va: ' . $va,
            'signature: ' . $signature,
            'timestamp: ' . $timestamp
        );

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POST, count($body));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $err = curl_error($ch);
        $ret = curl_exec($ch);
        curl_close($ch);
        if($err) {
            dump($err);
        } else {

            //Response
            $ret = json_decode($ret);
            if($ret->Status == 200) {

                $sessionId  = $ret->Data->SessionID;
                $url        =  $ret->Data->Url;
                // dd($url);
                return $url;
                
                // dump($url,$sessionId);
                // header('Location:' . $url);
            } else {
                dump($ret);
            }
            //End Response
        }

    }
    
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
        $url=$this->idopin($flight);
        return redirect($url);
        // $this->endcoredata($data);
    }

    private function endcoredata($data='null')
    {
        dd($data);
    }
}
