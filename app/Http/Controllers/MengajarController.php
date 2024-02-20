<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mengajar = Mengajar::all();
        return view('mengajar.index',compact('mengajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('mengajar.create',compact('guru', 'mapel', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_mengajar = $request->validate([
           'guru_id' => ['required'],
           'mapel_id' => ['required'],
           'kelas_id' => ['required'],
        ]);

        $mengajar = Mengajar::firstOrNew($data_mengajar);

        if($mengajar->exists){
            return back()->with('error','Data Mengajar Yang Dimasukkan Sudah Ada');
        }else{
            $mengajar->save();
            return redirect('/mengajar/index')->with('success','Data Mengajar Berhasil Ditambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mengajar $mengajar)
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('mengajar/edit',[
            'mengajar' => $mengajar,
        ],compact('guru', 'kelas','mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mengajar $mengajar)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas' => ['required'],
         ]);
         
         if($request->mapel_id != $mengajar->mapel_id || $request->kelas_id != $mengajar->kelas_id){
            $cek_mengajar = Mengajar::where('mapel_id',$request->mapel_id)->where('kelas_id',$request->kelas_id)->first();
            
            if($cek_mengajar){
                return back()->with('error','Data Mengajar Yang Dimasukkan Sudah Ada');
            }
         }
         $mengajar->update($data_mengajar);
         if($mengajar){
            return redirect('/mengajar/index')->with('success','Data Kelas Berhasil Diubah');
        }else{
            return $request->all();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mengajar $mengajar)
    {
        $mengajar->delete();
        return back()->with('success','Data Mengajar Berhasil Dihapus');
    }
}