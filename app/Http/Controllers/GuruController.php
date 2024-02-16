<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mengajar;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_guru = $request->validate([
            'nip' => ['required','numeric','unique:gurus'],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);

        Guru::create($data_guru);
        return redirect('/guru/index')->with('success','Data Guru Berhasil Ditambah');
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
    public function edit(Guru $guru)
    {
        return view('guru.edit',[
            'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $data_guru = $request->validate([
            'nip' => ['required','numeric',Rule::unique('gurus')->ignore($guru->id)],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);

        $guru->update($data_guru);
        if($guru){
            return redirect('/guru/index')->with('success','Data Guru berhasil di ubah');
        }else{
            return $request->all();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id',$guru->id)->first();

        if($mengajar){
            return back()->with('error',"$guru->nama_guru masih digunakan di menu mengajar");
        }else{
            $guru->delete();
            return back()->with('success','Data Guru Berhasil Dihapus');
        }

        // $delete = Guru::where('id', $guru)->delete();
        // if($delete){
        //     return redirect('/guru/index');
        // }
    }
}
