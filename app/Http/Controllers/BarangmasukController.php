<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use App\Models\Barang;
use Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bmasuk = Barangmasuk::all();
        return view('admin.bmasuk.index', compact('bmasuk'));
    }
    public function cetakBm()
    {
        $keluar = Barangmasuk::all();
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
        return view('admin.bmasuk.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::findOrFail($request->id_barang);
        $rules = [
            'id_barang' => 'required',
            'tgl_msk' => 'required',
            'jumlah_msk' => 'required|numeric|min:1',
        ];

        $message = [
            'id_barang.required' => 'Nama Barang harus dipilih',
            'tgl_msk.required' => 'tanggal masuk harus diisi',
            'jumlah_msk.required' => 'jumlah barang masuk harus diisi',
            'jumlah_msk.numeric' =>'jumlah barang masuk harus pakai angka',
            'jumlah_msk.min' =>'jumlah angka tidak boleh negatif, minimal angka diisi 1',
        ];
        $barang = Barang::findOrFail($request->id_barang);
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Gagal', 'Data yang anda input ada kesalahan, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }
        elseif($request->jumlah_msk < 1){
        Alert::error('Gagal', 'Data angka yang anda input tidak boleh negatif, minimal angka diisi 1')->autoclose(2000);
        return back()->withErrors($validation)->withInput();
        }else{
        $barangmasuk = new Barangmasuk;
        $barangmasuk->id_barang = $request->id_barang;
        $barangmasuk->tgl_msk = $request->tgl_msk;
        $barangmasuk->jumlah_msk = $request->jumlah_msk;
        $barangmasuk->save();

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok += $request->jumlah_msk;
        $barang->save();
        Alert::success('Berhasil', 'Data yang diinput tersimpan');
        return redirect()->route('bmasuk.index');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barangmasuk $barangmasuk)
    {
        $bmasuk = Barangmasuk::all();
        return view('admin.bmasuk.show', compact('bmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $barangmasuk = Barangmasuk::findOrFail($id);
        // return view('admin.bmasuk.edit', compact('bmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $validated = $request->validate([
        //     'nama_barang' => 'required',
        //     'tanggal_msk' => 'required',
        //     'jumlah_msk' => 'required',

        // ]);

        // $barangmasuk= Barangmasuk::findOrFail($id);
        // $barangmasuk->id_barang = $request->id_barang;
        // $barangmasukr->tanggal_msk = $request->tanggal_msk;
        // $barangmasuk->jumlah_msk = $request->jumlah_msk;
        // $barangmsk->save();
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Data edited successfully",
        // ]);
        // return redirect()->route('bmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $barangmasuk = Barangmasuk::findOrFail($id);
    $barangmasuk->delete();
    Alert::success('Berhasil', 'Data berhasil dihapus');
       return redirect()->route('bmasuk.index');
    }
}
