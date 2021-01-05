<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ijazah;
use Auth;
use Illuminate\Support\Facades\DB;

class IjazahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ijazah = DB::table('tb_ijazah')->where('nuptk',Auth::user()->nuptk)->get();
        return view("ijazah.index",["ijazah" => $ijazah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ijazah.create");
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
        $ijazah = new Ijazah();
        $ijazah->nuptk = Auth::user()->nuptk;
        $pdfName = time().'.'.$request->pdf->extension();  
   
        $request->pdf->move(public_path('assets/files/ijazah/'), $pdfName);
        $ijazah->ijazah = $pdfName;
        $ijazah->save();
        
        return redirect('ijazah')->with('success','Ijazah berhasil diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function destroy($ijazah)
    {
        \File::delete(public_path('assets/files/ijazah/'.$ijazah));
        DB::table('tb_ijazah')->where('ijazah',$ijazah)->delete();
        return redirect('ijazah')->with('success','Data berhasil dihapus');
    }
}
