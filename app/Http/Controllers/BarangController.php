<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('admin.barang.index', compact('barang'));
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
        return view('admin.barang.create', compact('barang'));
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
        // $validated = $request->validate([
        //     'nama_barang' => 'required',
        //     'kategori_barang' => 'required',
        //     'merek' => 'required',
        // ]);

        $rules = [
            'nama_barang' => 'required|max:255',
            'merek' => 'required|max:255|unique:barangs',
            'kategori_barang' => 'required',
        ];

        $message = [
            'nama_barang.required' => 'Nama Barang harus diisi',
            'nama_barang.max' => 'Nama Barang maksimal 255 karakter',
            'merek.required' => 'Merek harus diisi',
            'merek.unique' => 'Merek sudah digunakan',
            'merek.max' => 'Merek maksimal 255 karakter',

            'kategori_barang.required' => 'Kategori Barang harus dipilih',
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Gagal', 'Data yang di masukan terjadi kesalahan, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_barang = $request->kategori_barang;
        $barang->merek = $request->merek;
        // $barang->jumlah_stok = $request->jumlah_stok;
        $barang->save();
        Alert::success('Berhasil', 'Data yang diinput sudah tersimpan');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'merek' => 'required|max:255',
            'nama_barang' => 'required|max:255|unique:barangs',
            'kategori_barang' => 'required',
        ];

        $message = [
            'merek.required' => 'Merek harus diisi',
            'merek.unique' => 'Merek sudah digunakan',
            'merek.max' => 'Merek maksimal 255 karakter',
            'nama_barang.required' => 'Nama Barang harus diisi',
            'nama_barang.max' => 'Nama Barang maksimal 255 karakter',
            'kategori_barang.required' => 'Kategori Barang harus dipilih',
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Gagal', 'Data yang di masukan terjadi kesalahan, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_barang = $request->kategori_barang;
        $barang->merek = $request->merek;
        // $barang->jumlah_stok = $request->jumlah_stok;
        $barang->save();
        Alert::success('Berhasil', 'Data yang diinput sudah tersimpan');
        return redirect()->route('barang.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (!Barang::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Selamat', 'Data sudah dihapus');
        return redirect()->route('barang.index');
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
