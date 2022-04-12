<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Menu;
use DateTime;
use DateTimeZone;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->paginate(10);
        return view('kasir.index',compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu= Menu::all();
        return view('kasir.create', compact('menu'));
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
            'nama_pelanggan' => 'required',
            'nama_menu' => 'required',
            'jumlah' => 'required'
        ]);

        $menu= Menu::whereNamaMenu($request->nama_menu)->first();
        if(!$menu){
            return back()->with('error', 'menu tidak ada');

        }
        $valid= $menu->ketersediaan < $request->jumlah;

        if($valid){
            return back()->with('warning', 'Menu Sudah Tidak Tersedia');
        }else{
            Transaksi::create([
                'nama_pelanggan' => $request->nama_pelanggan,
                'nama_menu' => $request->nama_menu,
                'jumlah' => $request->jumlah,
                'harga' => $menu->harga,
                'total_harga' => $menu->harga * $request->jumlah,
                'nama_pegawai' => auth()->user()->name,
            ]);
            $menu->update([
                'ketersediaan' => $menu->ketersediaan - $request->jumlah,
            ]);
            return redirect()->route('kasir')
            ->with('success','Berhasil Menambah Transaksi !');
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaksi::find($id);
        $delete = $data->delete();

        if($delete){
            return redirect()->route('kasir')
            ->with('delete','Berhasil Menghapus !');
        }else{
            return back()->with('error', 'Opss sepertinya ada yang salah');
        }
    }
}
