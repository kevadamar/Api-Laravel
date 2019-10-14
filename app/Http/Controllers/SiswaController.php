<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return response()->json([
            'data' => $siswas
        ]);
    }

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
        $nama= $request->nama;
        $alamat = $request->alamat;
        $createSiswa = new Siswa;
        $data = [
            'nama' => $nama,
            'alamat' => $alamat
        ];
        $createSiswa->nama = $data['nama'];
        $createSiswa->alamat = $data['alamat'];
        $createSiswa->save();
        return response()->json($createSiswa);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa,$id)
    {
        $getId = Siswa::find($id);

        return response()->json($getId);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa,$id)
    {
        $getData = Siswa::find($id);
        
        $nama = $request->nama;
        $alamat = $request->alamat;
    
        $data = [
            'nama' => $nama,
            'alamat' => $alamat
        ];
        
        // $getData->nama = $nama;
        // $getData->alamat = $alamat;
        // $getData->save();
        $getData->update($data);
        return response()->json([
            'message' => "Data Berhasil Di ubah",
            'data' => $getData
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa,$id)
    {
        $getId = Siswa::find($id);
        $getId->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete Berhasil'
        ]);
    }
}
