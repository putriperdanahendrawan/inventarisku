<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\Barang;
use DB;
use Alert;

class ReportController extends Controller
{
    public function index(){
        return view('admin.cetak-laporan.index');
    }

    public function laporan(Request $request){
        $start = $request->tanggal_awal;
        $end = $request->tanggal_akhir;

        if($end >= $start){
            if($request->cetak == "masuk"){
                $bm = Barangmasuk::whereBetween('tgl_msk', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-bm', compact('bm','start','end'));
                return $pdf->download('laporan-barang-masuk.pdf');


            }
            elseif($request->cetak == "keluar"){
                $bk = Barangkeluar::whereBetween('tgl_klr', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-bk', compact('bk','start','end'));
                return $pdf->download('laporan-barang-keluar.pdf');

            }
        }
        elseif($end < $start){
           Alert::error('Gagal', 'Data Tanggal salah')->autoclose(2000);
            return back()->withInput();
        }
    }
}
