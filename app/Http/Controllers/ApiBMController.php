<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;

class ApiBMController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $barangmasuk = Barangmasuk::All();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Berhasil',
            'data' => $barangmasuk,
        ]);
    }
    // else {
    //     return response()->json([
    //         'status' => false,
    //         'code' => 404,
    //         'message' => 'Gagal',
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $artikel = DB::table('barangmasuks')
            ->join('id_barang', 'id_barang', '=', 'id', )
            ->select('barangmasuks.nama_barang', 'barangmasuks.kategori_barang', 'barangmasuks.merek', 'barangmasuk.id_barang as barang')
            ->get();

        $barangmasuk = new Barangmasuk;
        $barangmasuk->id_barang = $request->nama_barang;
        $barangmasuk->tgl_msk = $request->tgl_msk;
        $barangmasuk->jumlah_msk = $request->jumlah_msk;
        $barangmasuk->save();
        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok += $request->jumlah_msk;
        $barang->save();

        return response()->json([
            'success' => true,
            'message' => 'data user berhasil dibuat',
            'data' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
