<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Peminjam;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam = Peminjam::orderBy('created_at','DESC')->get();
        return view('admin.peminjam.index',compact('pinjam'));
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
        //
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
        $pinjam = Peminjam::find($id);
        $pinjam->update($request->all());
        $notif = Notification::create([
            'title' => "Pinjaman DiSetujui",
            'user_id' => $pinjam->user_id,
            'text' => "Segera Ambil Pinjaman Buku Anda DiPerpus Dan Tunjukan Bukti Pengajuan",
            'status' => 0,
        ]);
        return redirect()->back()->with('update',"Sukses");
    }

    public function dikembalikan(Request $request, $id)
    {
        $pinjam = Peminjam::find($id);
        $pinjam->update($request->all());
        return redirect()->back()->with('dikembalikan',"Sukses");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
