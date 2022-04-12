<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Menu;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::latest()->paginate(10);
        return view('manager.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('manager.create');
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
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'ketersediaan' => 'required'
        ]);
        $store = Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'ketersediaan' => $request->ketersediaan,
        ]);

        if($store){
            return redirect()->route('manager')
            ->with('success','Berhasil Menyimpan !');
        }else{
            return back()->with('error', 'Opss sepertinya ada yang salah');
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
    public function edit($id)
    {
        $edit = Menu::find($id);
        return view('manager.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'ketersediaan' => 'required'
        ]);

        $edit = Menu::find($request->id);
        $update = $edit->update($request->all());

        if($update){
            return redirect()->route('manager')
            ->with('success','Berhasil Mengedit !');
        }else{
            return back()->with('error', 'Opss sepertinya ada yang salah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Menu::find($id);
        $delete = $data->delete();

        if($delete){
            return redirect()->route('manager')
            ->with('delete','Berhasil Menghapus !');
        }else{
            return back()->with('error', 'Opss sepertinya ada yang salah');
        }
    }
    public function laporan(){
        $laporan = Transaksi::all();
        return view('manager.laporan',compact('laporan'));
    }

}
