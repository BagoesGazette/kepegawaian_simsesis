<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;

class KepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepegawaian = DB::table('tb_login')->where('role', 'kepegawaian')->get();
        return view("kepegawaian.index",["kepegawaian" => $kepegawaian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("kepegawaian.create");
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
        $user->role             = "kepegawaian";
        $user->remember_token   = Str::random(60);
        $user->save();
        return redirect()->route('kepegawaian')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kepegawaian = User::find($id);
        return view("kepegawaian.show",compact('kepegawaian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kepegawaian = User::find($id);
        return view("kepegawaian.edit",compact('kepegawaian'));
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
        $user->role             = "kepegawaian";
        $user->remember_token   = $request->remember_token;
        $user->save();
        return redirect('kepegawaian')->with('success','Data berhasil diupdate');
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
        return redirect('kepegawaian')->with('success','Data berhasil dihapus');
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
        $user->name             = $user->name;
        $user->nuptk            = $user->nuptk;
        $user->password         = Hash::make($request->password);
        $user->role             = "kepegawaian";
        $user->remember_token   = $user->remember_token;
        $user->save();
        return redirect('kepegawaian')->with('success','Password berhasil diubah');
    }
}
