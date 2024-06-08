<?php

namespace App\Http\Controllers;

use App\Models\info;
use Illuminate\Http\Request;


class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = info::orderBy('id','desc')->paginate(4);
        return view('info.dashboard')->with('data',$data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_info'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required|mimes:jpeg,jpg,png,gif'//Ekstensi Foto
        ],);

        $foto_file = $request->file('foto'); // Menangkap File 'foto' di 'Create.blade'
        $foto_ekstensi = $foto_file->extension(); // Dari Sebuah file, di mempunyai Ekstensi Berjenis apa?
        $foto_nama = date('ymdhis').".".$foto_ekstensi; // (tahun,bulan,jam,menit,detik) = Merubah nama file, mencegah samanya nama file
        $foto_file->move(public_path('foto'),$foto_nama); // memindahkan file yang diunggah oleh pengguna ke direktori 'public/foto' di server dengan nama yang ditentukan oleh variabel $foto_nama.

        $data = [
            'judul_info' => $request->input('judul_info'),
            'deskripsi' => $request->input('deskripsi'),
            'foto' => $foto_nama // hanya menyimpan nama file saja, karena file nya sudah disimpan di directory 'public/foto'
        ];

        info::create($data);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = info::where('id',$id)->first();
        return view('info/show')->with('data',$data);


    }

    public function showTechStack(){
        return view('info/techStack');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
