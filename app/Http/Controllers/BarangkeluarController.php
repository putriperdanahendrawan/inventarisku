<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barang;
use Alert;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bkeluar = Barangkeluar::all();
        return view('admin.bkeluar.index', compact('bkeluar'));
    }
    public function cetakBk()
    {
        $keluar = Barangkeluar::all();
        $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-bk', ['keluar' => $keluar]);
        return $pdf->download('laporan-barang-keluar.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        return view('admin.bkeluar.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//       $validated = $request->validate([
//        'id_barang' => 'required',
//        'tgl_klr' => 'required',
//        'alasan' => 'required',
//        'jumlah_klr' => 'required',
// ]);
$barang = Barang::findOrFail($request->id_barang);
$rules = [
    'id_barang' => 'required',
    'tgl_klr' => 'required',
    'alasan' => 'required',
    'jumlah_klr' => 'required|numeric|min:1|max:'.$barang->jumlah_stok,
];

$message = [
    'id_barang.required' => 'Nama Barang harus dipilih',
    'alasan.required' => 'alasan harus dipilih',
    'tgl_klr.required' => 'tanggal keluar harus diisi',
    'jumlah_klr.required' => 'jumlah barang keluar harus diisi',
    'jumlah_klr.numeric' =>'jumlah barang harus pakai angka',
    'jumlah_klr.min' =>'jumlah angka tidak boleh negatif, minimal angka diisi 1',
    'jumlah_klr.max' =>'barang kelebihan dari jumblah stok yang tersedia',
];

        $barang = Barang::findOrFail($request->id_barang);
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
    Alert::error('Gagal', 'Data yang anda input ada kesalahan, silahkan diulang')->autoclose(2000);
    return back()->withErrors($validation)->withInput();
}
        elseif($request->jumlah_klr > $barang->jumlah_stok){
        Alert::error('Gagal', 'Data yang anda input melebihi jumlah stok')->autoclose(2000);
        return back()->withErrors($validation)->withInput();

            }
        elseif($request->jumlah_klr < 1){
        Alert::error('Gagal', 'Data angka yang anda input tidak boleh negatif, minimal angka diisi 1')->autoclose(2000);
        return back()->withErrors($validation)->withInput();

        }else{
           $barangkeluar = new Barangkeluar;
           $barangkeluar->id_barang = $request->id_barang;
           $barangkeluar->tgl_klr = $request->tgl_klr;
           $barangkeluar->jumlah_klr = $request->jumlah_klr;
           $barangkeluar->alasan = $request->alasan;
           $barangkeluar->save();
           $barang->jumlah_stok -= $request->jumlah_klr;
            $barang->save();
        }
        Alert::success('Berhasil', 'Data yang diinput Sudah Tersimpan');
        return redirect()->route('bkeluar.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Barangkeluar $barangkeluar)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       //
       $barangkeluar = Barangkeluar::findOrFail($id);
       $barangkeluar->delete();
       Alert::success('Berhasil', 'Data sudah dihapus');
       return redirect()->route('bkeluar.index');
    }
}
