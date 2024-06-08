<?php

namespace App\Http\Controllers;

use App\Models\info;
use App\Models\comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,info $info)
    {
    //    $komentar = comment::create($request->all());
    //    return redirect()->back();
    $request->validate([
        'comment' => 'required|string',
        'info_id' => 'required',
    ],[
        'comment.required'=>'Comment Wajib Diisi'
    ]);

    Comment::create([
        'comment' => $request->comment,
        'info_id' => $request->info_id,
        'user_id' => auth()->id(),
    ]);
    return redirect()->back()->with('berhasil','Comment berhasil');

    }

    /**s\
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $komentar = comment::findOrFail($id);

                // Verifikasi apakah pengguna saat ini adalah pemilik komentar
                if ($komentar->user_id !== auth()->id()) {
                    return redirect()->back()->with('error', 'You do not have permission to delete this comment.');
                }
                $komentar->delete();
                return redirect()->back()->with('berhasil', 'Comment berhasil di hapus.');
    }
}
