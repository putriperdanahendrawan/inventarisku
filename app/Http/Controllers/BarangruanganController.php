<?php

namespace App\Http\Controllers;

use App\Models\Barangruangan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BarangruanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $barangruangan = Barangruangan::orderBy('created_at', 'DESC')->get();
        $ruanganes = Ruangan::all();
        return view('barangruangan.index', compact('barangruangan', 'ruanganes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangruangan = Barangruangan::all();
        $ruangan = Ruangan::all();
        return view('barangruangan.create', compact('barangruangan', 'ruangan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_ruangan' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);
        $arangruangan = new Barangruangan;
        $barangruangan->id_barang = $request->id_barang;
        $barangruangan->id_ruangan = $request->id_ruangan;
        $barangruangan->jumlah = $request->jumlah;
        $barangruangan->save();
        return redirect()->route('admin.barangruangan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangruangan  $barangruangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangruangan = Barangruangan::findOrFail($id);
        return view('barangruangan.show', compact('barangruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangruangan  $barangruangan
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $barangruangan = Barangruangan::findOrFail($id);
    //     $ruangan = Ruangan::all();
    //     return view('barangruangan.edit', compact('barangruangan', 'ruangan'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangruangan  $barangruangan
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'poto'=>'image|mimes:jpg,png,jpeg',
    //         'judul' => 'required',
    //         'isi' => 'required',
    //         'nama_penulis' => 'required',
    //         'tanggal' => 'required'

    //     ]);
    //     $barangruangan = Barangruangan::findOrFail($id);
    //     $barangruangan->judul = $request->judul;
    //     $barangruangan->isi = $request->isi;
    //     $barangruangan->id_ruangan = $request->id_ruangan;
    //     if ($request->hasFile('poto')) {
    //         $barangruangan->deleteImage();
    //         $image = $request->file('poto');
    //         $name = rand(1000, 9999) . $image->getClientOriginalName();
    //         $image->move('image/barangruangan/', $name);
    //         $barangruangan->poto = $name;
    //     }
    //     $barangruangan->nama_penulis = $request->nama_penulis;
    //     $barangruangan->tanggal = $request->tanggal;

    //     $barangruangan->save();
    //     return redirect()->route('barangruangan.index')->with('success', 'Data Berhasil Diedit');

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangruangan  $barangruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangruangan = Barangruangan::findOrFail($id);
        $barangruangan->delete();
        return redirect()->route('admin.barangruangan.index');

    }
    public function BarangruanganRuangan(Ruangan $ruangan)
    {
        $barangruangan = Barangruangan::where('id_ruangan', $ruangan->id)->get();
        $ruanganes = Ruangan::all();
        return view('barangruangan.tampilan', compact('barangruangan', 'ruangan', 'ruanganes'));
    }
}
