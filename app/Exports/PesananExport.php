<?php

namespace App\Exports;

use App\Models\Pesanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB; 

class PesananExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        $y=date('Y');
        $m=date('m');

        if (!empty($_GET['y'])) {
            $y=$_GET['y'];
        }

        if (!empty($_GET['y'])) {
            $m=$_GET['m'];
        }

        $fore=DB::table('users')
                ->join('roles', 'roles.id', '=', 'users.role_id')
                ->select('users.name as namaLengkap','roles.*','users.*')
                ->where('roles.display_name','Kasir')->get();
        foreach ($fore as $key => $masl) {
            $data1[$key]['item']=DB::table('Pesanan')
                    ->join('users', 'users.id', '=', 'Pesanan.id_petugas')
                    ->where('Pesanan.created_at','like','%'.$y.'-'.$m.'%')
                    ->where('users.id',$masl->id)->get();
            $data1[$key]['users']=$masl;
        }
        $data=array('data'=>$data1);
        // dd($data);
        return view('exports.DataPesanan', $data);
    }
}