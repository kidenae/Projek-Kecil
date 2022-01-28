<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = IdGenerator::generate(['table' => 'barangs', 'length' => 8, 'prefix' =>'BRG-', 'field' => 'id_barang']);
        $barang = Barang::all()->sortByDesc('created_at');
        return view('barang.barang', compact('barang', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('barangs')->insert([
            'id_barang' => $request->idBrg,
            'nama_brg' => $request->nama_brg,
            'kategori' => $request->ktg,
            'deskripsi' => $request->deskrip,
            'jumlah' => $request->jml,
            'harga' => $request->hrg,
            'created_at' => now()
        ]);
        return redirect('barang')->with('status', 'Data Berhasil Ditambah!');

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = IdGenerator::generate(['table' => 'barangs', 'length' => 8, 'prefix' =>'BRG-', 'field' => 'id_barang']);

        return view('barang.in_brg', compact('id')
    );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang, $id)
    {
        $barang=Barang::all()->where('id', $id)->first();
        return view('barang.ed_brg', compact('barang'));

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
        DB::table('barangs')->where('id',$id)
        ->update([
            'nama_brg' => $request->nama_brg,
            'kategori' => $request->ktg,
            'deskripsi' => $request->deskrip,
            'jumlah' => $request->jml,
            'harga' => $request->hrg,
            'updated_at' =>  now()
        ]);
        return redirect('barang')->with('status', 'Data Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang, $id)
    {
        DB::table('barangs')->where('id', $id)->delete();
        return redirect('barang')->with('status', 'Data Berhasil Dihapus!');

    }
}
