<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;

class AdminPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepegawaian = DB::table('tb_login')->where('role', 'adminPegawai')->get();
        return view("adminPegawai.index",["kepegawaian" => $kepegawaian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adminPegawai.create");
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
            'nama'          => 'required',
            'nuptk'         => 'required',
            'password'      => 'required'
        ]);
        
        $user                   = new User;
        $user->name             = $request->nama;
        $user->nuptk            = $request->nuptk;
        $user->password         = bcrypt($request->password);
        $user->role             = "adminPegawai";
        $user->remember_token   = Str::random(60);
        $user->save();
        return redirect()->route('adminPegawai')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adminPegawai = User::find($id);
        return view("adminPegawai.show",compact('adminPegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminPegawai = User::find($id);
        return view("adminPegawai.edit",compact('adminPegawai'));
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
            'nama'          => 'required',
            'nuptk'         => 'required',
            'password'      => 'required'
        ]);
        $user = User::find($request->id);
        $user->name             = $request->nama;
        $user->nuptk            = $request->nuptk;
        $user->password         = $request->password;
        $user->role             = "adminPegawai";
        $user->remember_token   = $request->remember_token;
        $user->save();
        return redirect('adminPegawai')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('adminPegawai')->with('success','Data berhasil dihapus');
    }

        /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function password(Request $request)
    {
        // Validate the new password length...
        $request->validate([
            'password'      => 'required'
        ]);
        $user = User::find($request->id);
        $user->password         = Hash::make($request->password);
        $user->save();
        return redirect('adminPegawai')->with('success','Password berhasil diubah');
    }
}
