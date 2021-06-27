<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
Use Alert;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::all();  // select * from nama_tabl
        return view ('mahasiswa.index', compact('mahasiswa'));
    }
    public function create(){
        return view ('mahasiswa.tambah');
    }
    public function store(Request $request){
        Mahasiswa::create($request->all());
        alert()->success('Sukses','Data Berhasil Disimpan');
        return redirect()->route('index');
    }
    public function edit($id){
        $mahasiswa = Mahasiswa::find($id);
        return view ('mahasiswa.edit', compact('mahasiswa'));
    }
    public function update(Request $request, $id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        toast('Data sudah diedit','success');
        return redirect()->route('index');
    }

    public function del($id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        toast('Data sudah dihapus','success');
        return redirect()->route('index');
    }
}

