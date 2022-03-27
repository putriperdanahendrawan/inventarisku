<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\Peminjam;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kembali = Pengembalian::all();
        return view('admin.kembali.index', compact('kembali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $barang = Barang::all();
        $peminjam = Peminjam::all();
        return view('admin.kembali.create', compact('barang', 'peminjam'));
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
        $barang = Barang::findOrFail($request->id_barang);
        $peminjam = Peminjam::findOrFail($request->id_peminjam);
        $rules = [
            'id_barang' => 'required',
            'id_peminjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',
            'jumlah_kembali' => 'required|numeric|min:1|max:' . $peminjam->jumlah_pinjam,
        ];

        $message = [
            'id_barang.required' => 'Nama Barang harus dipilih',
            'status.required' => 'status harus dipilih',
            'tgl_kembali.required' => 'tanggal kembali harus diisi',
            'jumlah_kembali.required' => 'jumlah barang kembali harus diisi',
            'jumlah_kembali.numeric' => 'jumlah barang harus pakai angka',
            'jumlah_kembali.min' => 'jumlah angka tidak boleh negatif, angka minimal diisi 1',
            'jumlah_kembali.max' => 'barang kelebihan dari jumblah yang dipinjam',
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Gagal', 'Data yang anda input terjadi kesalahan, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        } 
        // elseif ($request->jumlah_kembali < 1) {
        //     Alert::error('Gagal', 'Data angka yang anda input tidak boleh negatif, minimal angka diisi 1')->autoclose(2000);
        //     return back()->withErrors($validation)->withInput();
        // } elseif ($request->jumlah_klr > $barang->jumlah_stok) {
        //     Alert::error('Gagal', 'Data yang anda input melebihi jumlah stok')->autoclose(2000);
        //     return back()->withErrors($validation)->withInput();
        // }
        $barang = Barang::findOrFail($request->id_barang);
        $peminjam = Peminjam::findOrFail($request->id_peminjam);
            $kembali = new Pengembalian;
            $kembali->id_peminjam = $request->id_peminjam;
            $kembali->id_barang = $request->id_barang;
            $kembali->jumlah_kembali = $request->jumlah_kembali;
            $kembali->tgl_kembali = $request->tgl_kembali;
            $kembali->status = $request->status;
            $kembali->save();
            $barang->jumlah_stok += $request->jumlah_kembali;
            $barang->save();
            $peminjam->jumlah_pinjam -= $request->jumlah_kembali;
            $peminjam->save();
            Alert::success('Berhasil', 'Data Sudah tersimpan');
            return redirect()->route('kembali.index');
          

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kembali = Pengembalian::findOrFail($id);
        $kembali->delete();
        Alert::success('Berhasil', 'Data Sudah dihapus');
        return redirect()->route('kembali.index');

    }
}
