<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataDiri;
use App\Models\Pegawai;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PegawaiExport;

class KinerjaKepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->image === null){
            return view("kinerjaPegawai.index");
        }else{
            $dataDiri   = DB::table('tb_data_diri')->where('nuptk', Auth::user()->nuptk)->first();
            $pegawai    = DB::table('tb_pegawai')->where('id_pegawai',$dataDiri->id_dataDiri)->first();
            $pendidikan = DB::table('tb_pendidikan')->where('id_pendidikan',$dataDiri->id_dataDiri)->first();
            return view("kinerjaPegawai.index",["dataDiri" => $dataDiri, "pegawai" => $pegawai, "pendidikan" => $pendidikan]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'image'                     => 'required|image|mimes:jpeg,png,jpg',
            'kode_guru'                 => 'required',
            'nama_lengkap'              => 'required',
            'nip'                       => 'required',
            'nuptk'                     => 'required',
            'status'                    => 'required',
            'sumber_gaji'               => 'required',
            'wilayah_pembayaran'        => 'required',
            'no_ktp'                    => 'required',
            'tempat'                    => 'required',
            'tanggal_lahir'             => 'required',
            'jenis_kelamin'             => 'required',
            'agama'                     => 'required',
            'status_perkawinan'         => 'required',
            'alamat_rumah'              => 'required',
            'email'                     => 'required',
            'no_hp'                     => 'required',
            'suami_istri'               => 'required',
            'jumlah_anak'               => 'required',
            'skpd'                      => 'required',
            'asal_kepegawaian'          => 'required',
            'status_hukum'              => 'required',
            'jenis_kepegawaian'         => 'required',
            'pangkat'                   => 'required',
            'tmt'                       => 'required',
            'jenjang'                   => 'required',
            'nama_sekolah'              => 'required',
            'jurusan'                   => 'required',
            'tahun_lulus'               => 'required',
        ]);
        $user = User::find(auth()->user()->id);
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('assets/img/pegawai/'), $imageName);
        $user->image = $imageName;
        $user->save();
        $dataDiri                       = new DataDiri();
        $dataDiri->image                = $imageName;
        $dataDiri->kode_guru            = $request->kode_guru;
        $dataDiri->nama_lengkap         = $request->nama_lengkap;
        $dataDiri->nip                  = $request->nip;
        $dataDiri->nuptk                = $request->nuptk;
        $dataDiri->status_pegawai       = $request->status;
        $dataDiri->sumber_gaji          = $request->sumber_gaji;
        $dataDiri->wilayah_pembayaran   = $request->wilayah_pembayaran;
        $dataDiri->no_ktp               = $request->no_ktp;
        $dataDiri->tempat               = $request->tempat;
        $dataDiri->tanggal_lahir        = $request->tanggal_lahir;
        $dataDiri->jenis_kelamin        = $request->jenis_kelamin;
        $dataDiri->agama                = $request->agama;
        $dataDiri->status_perkawinan    = $request->status_perkawinan;
        $dataDiri->alamat_rumah         = $request->alamat_rumah;
        $dataDiri->email                = $request->email;
        $dataDiri->no_hp                = $request->no_hp;
        $dataDiri->suami_istri          = $request->suami_istri;
        $dataDiri->jumlah_anak          = $request->jumlah_anak;
        $dataDiri->save();

        $pegawai                = new Pegawai();
        $pegawai->skpd          = $request->skpd;
        $pegawai->asal_pegawai  = $request->asal_kepegawaian;
        $pegawai->status_hukum  = $request->status_hukum;
        $pegawai->jenis_pegawai = $request->jenis_kepegawaian;
        $pegawai->pangkat       = $request->pangkat;
        $pegawai->tmt           = $request->tmt;
        $pegawai->masa_kerja    = $request->masa_kerja;
        $pegawai->save();

        $pendidikan                 = new Pendidikan();
        $pendidikan->jenjang        = $request->jenjang;
        $pendidikan->nama_sekolah   = $request->nama_sekolah;
        $pendidikan->jurusan        = $request->jurusan;
        $pendidikan->tahun_lulus    = $request->tahun_lulus;
        $pendidikan->save();
        return redirect('informasiKetenagaan')->with('success','Data berhasil diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("kinerjaPegawai.show");
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
    public function destroy($id)
    {
        //
    }

    public function pdf(){
        $dataDiri   = DB::table('tb_data_diri')->where('nuptk', Auth::user()->nuptk)->first();
        $pegawai    = DB::table('tb_pegawai')->where('id_pegawai',$dataDiri->id_dataDiri)->first();
        $pendidikan = DB::table('tb_pendidikan')->where('id_pendidikan',$dataDiri->id_dataDiri)->first();
        $contxt = stream_context_create([
            'ssl' => [
            'verify_peer' => FALSE,
            'verify_peer_name' => FALSE,
            'allow_self_signed'=> TRUE
            ]
            ]);
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf->getDomPDF()->setHttpContext($contxt);
        $pdf = PDF::loadview('kinerjaPegawai.pdf',["dataDiri" => $dataDiri, "pegawai" => $pegawai, "pendidikan" => $pendidikan])->setPaper('A4', 'potrait');
        return $pdf->stream();
    } 

    public function excel(){
      
        return Excel::download(new PegawaiExport,'pegawai.xlsx');
    }
}
