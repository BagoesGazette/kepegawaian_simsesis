<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SK;
use Auth;
use Illuminate\Support\Facades\DB;

class SKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sk = DB::table('tb_sk')->where("nuptk",Auth::user()->nuptk)->get();
        return view("sk.index",["sk" => $sk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("sk.create");
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
            'pdf' => 'required|mimes:pdf',
        ]);
        $sk = new SK();
        $sk->nuptk = Auth::user()->nuptk;
        $pdfName = time().'.'.$request->pdf->extension();  
   
        $request->pdf->move(public_path('assets/files/sk/'), $pdfName);
        $sk->sk = $pdfName;
        $sk->save();
        
        return redirect('sk')->with('success','SK berhasil diupload');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sk)
    {
        \File::delete(public_path('assets/files/sk/'.$sk));
        DB::table('tb_sk')->where('sk',$sk)->delete();
        return redirect('sk')->with('success','Data berhasil dihapus');
    }
}
