<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use Auth;
use Illuminate\Support\Facades\DB;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertifikat = DB::table('tb_sertifikat')->where("nuptk",Auth::user()->nuptk)->get();
        return view("sertifikat.index",["sertifikat" => $sertifikat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("sertifikat.create");
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
        $sertifikat = new Sertifikat();
        $sertifikat->nuptk = Auth::user()->nuptk;
        $pdfName = time().'.'.$request->pdf->extension();  
   
        $request->pdf->move(public_path('assets/files/sertifikat/'), $pdfName);
        $sertifikat->sertifikat = $pdfName;
        $sertifikat->save();
        
        return redirect('sertifikat')->with('success','Sertifikat berhasil diupload');
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
    public function destroy($sertifikat)
    {
        \File::delete(public_path('assets/files/sertifikat/'.$sertifikat));
        DB::table('tb_sertifikat')->where('sertifikat',$sertifikat)->delete();
        return redirect('sertifikat')->with('success','Data berhasil dihapus');
    }
}
