<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataperjalanan = Perjalanan::all();
        return view('Perjalanan.index', compact('dataperjalanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Perjalanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required',
        ]);

        Perjalanan::create([
            'tanggal'=> $request ->tanggal,
            'waktu'=> $request ->waktu,
            'lokasi'=> $request->lokasi,
            'suhu_tubuh'=>$request->suhu_tubuh
        ]);
        return redirect('/perjalanan')->with('success', 'Data Berhasil Ditambahkan');
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
        $perjalanan = Perjalanan::findorfail($id);
        return view('Siswa.edit', compact('perjalanan'));
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
        $this->validate($request,[
            'inpd' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);
        $perjalanan =Perjalanan::findorfail($id);
        $perjalanan->update($request->all());
        return redirect('/')->with('success','Data Berhasil di Update');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perjalanan =Perjalanan::findorfail($id);
        $perjalanan->delete();
        return back()->with('destroy','Data Berhasil di Destroy');
        
    }
}
