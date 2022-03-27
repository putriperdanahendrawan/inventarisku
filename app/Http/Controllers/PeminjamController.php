<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Barang;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peminjam = Peminjam::all();
        return view('admin.pinjam.index', compact('peminjam'));
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
        return view('admin.pinjam.create', compact('barang'));
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
        $rules = [
            'id_barang' => 'required',
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'status' => 'required',
            'jumlah_pinjam' => 'required|numeric|min:1|max:' . $barang->jumlah_stok,
];

        $message = [
            'id_barang.required' => 'Nama Barang harus dipilih',
            'nama_peminjam.required' => 'Nama Peminjam harus dipilih',
            'status.required' => 'status harus diisi',
            'tgl_pinjam.required' => 'tanggal pinjam harus diisi',
            'jumlah_pinjam.required' => 'jumlah barang pinjam harus diisi',
            'jumlah_pinjam.numeric' => 'jumlah barang harus pakai angka',
            'jumlah_pinjam.min' => 'jumlah angka tidak boleh negatif, angka minimal diisi 1',
            'jumlah_pinjam.max' => 'barang kelebihan dari jumblah stok yang tersedia',
        ];

        $barang = Barang::findOrFail($request->id_barang);
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
         Alert::error('Gagal', 'Data yang anda input terjadi kesalahan, silahkan diulang')->autoclose(2000);
        return back()->withErrors($validation)->withInput();
            }
        elseif($request->jumlah_pinjam < 1){
        Alert::error('Gagal', 'Data angka yang anda input tidak boleh negatif, minimal angka diisi 1')->autoclose(2000);
        return back()->withErrors($validation)->withInput();
        }
        $peminjam = new Peminjam;
        $peminjam->id_barang = $request->id_barang;
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjam->tgl_pinjam = $request->tgl_pinjam;
        $peminjam->status = $request->status;
        $peminjam->save();

        Alert::success('Berhasil', 'Data yang diinput telah tersimpan');

        $barang->jumlah_stok -= $request->jumlah_pinjam;
        $barang->save();

        return redirect()->route('pinjam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjam $peminjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->delete();
        Alert::success('Berhasil', 'Data sudah dihapus');
        return redirect()->route('pinjam.index');

    }
}
