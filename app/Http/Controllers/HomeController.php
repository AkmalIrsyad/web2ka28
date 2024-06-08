<?php

namespace App\Http\Controllers;

use App\Models\info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = info::where('judul_info','like','%'.$request->search.'%')->paginate(5);
        }else{
            $data = info::orderBy('id','desc')->paginate(5);
        }
        $users = User::all()->count();
        $post = info::all()->count();

        $userTarget = 40;
        $postTarget = 50;

        $usersProgress = ($users / $userTarget) * 100;
        $postProgress = ($post / $postTarget) * 100;

        // $data = info::orderBy('id','desc')->paginate(5);
        return view('admin.dashboard',compact('post','users','data','usersProgress','postProgress'));
    }

    public function create()
    {
        //
        return view('admin.create');
    }
    public function store(Request $request)
    {
        Session::flash('judul_info', $request->judul_info);
        Session::flash('deskripsi', $request->deskripsi);
        $request->validate([
            'judul_info'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required|mimes:jpeg,jpg,png,gif'//Ekstensi Foto
        ],[
            'judul_info.required'=>'judul info wajib di isi',
            'deskripsi.required'=>'Deskripsi Wajib di isi',
            'foto.required'=>'Foto wajib di isi',
            'foto.mimes'=>'Format foto adalah Berkestensi JPEG,JPG,PNG, dan GIF'
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
        return redirect('/admin/dashboard')->with('berhasil','Data Berhasil Dinput');
    }

   public function show(string $id)
   {
       //
       $data = info::where('id',$id)->first();
       return view('admin/show');
   }

   public function edit($id)
   {
       //
       $data = info::find($id);
       return view('admin/edit',compact(['data']));
   }





   public function update(Request $request, $id)
   {
    //
    $request->validate([
        'judul_info'=>'required',
        'deskripsi'=>'required'

    ],[
        'judul_info'=>'isi Judul info dulu',
        'deskripsi'=>'isi deskripsi dulu',
    ]);

    $data = [
        'judul_info' => $request->input('judul_info'),
        'deskripsi' => $request->input('deskripsi'),
    ];

    if($request->hasFile('foto')){
        $request->validate([
            'foto'=>'mimes:jpeg,jpg,png,gif'
        ],[
            'foto.mimes'=>'Foto hanya diperbolehkan Berekstensi JPEG,JPG,PNG, dan GIF'
        ]);

        $foto_file = $request->file('foto'); // Menangkap File 'foto' di 'Create.blade'
        $foto_ekstensi = $foto_file->extension(); // Dari Sebuah file, di mempunyai Ekstensi Berjenis apa?
        $foto_nama = date('ymdhis').".".$foto_ekstensi; // (tahun,bulan,jam,menit,detik) = Merubah nama file, mencegah samanya nama file
        $foto_file->move(public_path('foto'),$foto_nama); // memindahkan file yang diunggah oleh pengguna ke direktori 'public/foto' di server dengan nama yang ditentukan oleh variabel $foto_nama.

        // Menghapus Foto lama
        $data_foto = info::where('id',$id)->first();
        File::delete(public_path('foto').'/'.$data_foto->foto);

        // Upload nama Foto
        $data['foto'] = $foto_nama;
   }
   info::where('id',$id)->update($data);
   return redirect('/admin/dashboard')->with('berhasil','data berhasil di edit');
    }

    public function destroy(string $id)
    {
        //
        $data = info::where('id',$id)->first();
        File::delete(public_path('foto').'/'.$data->foto); //File::delete(public_path('foto').'/'.$data->foto);: Baris ini bertujuan untuk menghapus file foto siswa dari direktori 'public/foto'.

        info::where('id',$id)->delete();
        return redirect('/admin/dashboard')->with('berhasil','data berhasil di hapus');
    }
}
