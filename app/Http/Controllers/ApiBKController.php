<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;

class ApiBKController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $barangkeluar = Barangkeluar::All();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Berhasil',
            'data' => $barangkeluar,
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
        $barangkeluar = new Barangkeluar;
        $barangkeluar->id_barang = $request->id_barang;
        $barangkeluar->tgl_msk = $request->tgl_msk;
        $barangkeluar->jumlah_msk = $request->jumlah_msk;
        $barangkeluar->save();
        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok -= $request->jumlah_msk;
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
