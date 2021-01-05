<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ijazah;
use App\Models\Sertifikat;
use App\Models\SK;
use App\Models\User;
use App\Models\DataDiri;
use App\Models\Pegawai;
use App\Models\Pendidikan;
use Auth;
use PDF;

class InformasiPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminPegawai = DB::table('tb_login')->where('role','kepegawaian')->get();
        return view("informasiPegawai.index",["adminPegawai" => $adminPegawai]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nuptk)
    {
        $data = [
            "user" => $user = DB::table('tb_login')->where('nuptk',$nuptk)->first(),
            "dataDiri" => $dataDiri = DB::table('tb_data_diri')->where('nuptk', $nuptk)->first(),
            "pegawai" => DB::table('tb_pegawai')->where('id_pegawai',$dataDiri->id_dataDiri)->first(),
            "pendidikan" => DB::table('tb_pendidikan')->where('id_pendidikan',$dataDiri->id_dataDiri)->first()
        ];
        return view("informasiPegawai.updateInformasi",$data);
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
    public function update(Request $request)
    {
        $user       = User::find($request->id_user);
        $dataDiri   = DataDiri::find($request->id_dataDiri);
        $pegawai    = Pegawai::find($request->id_pegawai);
        $pendidikan = Pendidikan::find($request->id_pendidikan);
        if($request->image){
            \File::delete(public_path('assets/img/pegawai/'.$request->gambarLama));
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/img/pegawai/'), $imageName);
            $user->nuptk = $request->nuptk;
            $user->image = $imageName;
            $user->save();

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

            $pegawai->skpd          = $request->skpd;
            $pegawai->status_hukum  = $request->status_hukum;
            $pegawai->jenis_pegawai = $request->jenis_kepegawaian;
            $pegawai->pangkat       = $request->pangkat;
            $pegawai->tmt           = $request->tmt;
            $pegawai->masa_kerja    = $request->masa_kerja;
            $pegawai->save();

            $pendidikan->jenjang       = $request->jenjang;
            $pendidikan->nama_sekolah  = $request->nama_sekolah;
            $pendidikan->jurusan       = $request->jurusan;
            $pendidikan->tahun_lulus   = $request->tahun_lulus;
            $pendidikan->save();
            return redirect('informasiPegawai')->with('success','Data berhasil diupdate');

        }else{
            $user->nuptk = $request->nuptk;
            $user->image = $request->gambarLama;
            $user->save();

            $dataDiri->image                = $request->gambarLama;
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

            $pegawai->skpd          = $request->skpd;
            $pegawai->status_hukum  = $request->status_hukum;
            $pegawai->jenis_pegawai = $request->jenis_kepegawaian;
            $pegawai->pangkat       = $request->pangkat;
            $pegawai->tmt           = $request->tmt;
            $pegawai->masa_kerja    = $request->masa_kerja;
            $pegawai->save();

            $pendidikan->jenjang       = $request->jenjang;
            $pendidikan->nama_sekolah  = $request->nama_sekolah;
            $pendidikan->jurusan       = $request->jurusan;
            $pendidikan->tahun_lulus   = $request->tahun_lulus;
            $pendidikan->save();
            return redirect('informasiPegawai')->with('success','Data berhasil diupdate');
        }
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

    public function pdf($nuptk){
        $dataDiri   = DB::table('tb_data_diri')->where('nuptk', $nuptk)->first();
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

    public function ijazah(){
        $ijazah = DB::table('tb_ijazah')->get();
        return view("informasiPegawai.ijazah",["ijazah" => $ijazah]);
    }

    public function ijazahCreate(){
        $kepegawaian = DB::table('tb_login')->where('role','kepegawaian')->get();
        return view("informasiPegawai.ijazahCreate",["kepegawaian" => $kepegawaian]);
    }

    public function ijazahStore(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);
        $ijazah = new Ijazah();
        $ijazah->nuptk = $request->nuptk;
        $pdfName = time().'.'.$request->pdf->extension();  
   
        $request->pdf->move(public_path('assets/files/ijazah/'), $pdfName);
        $ijazah->ijazah = $pdfName;
        $ijazah->save();
        
        return redirect('informasiPegawai/ijazah')->with('success','Ijazah berhasil diupload');
    }

    public function ijazahDestroy($ijazah)
    {
        \File::delete(public_path('assets/files/ijazah/'.$ijazah));
        DB::table('tb_ijazah')->where('ijazah',$ijazah)->delete();
        return redirect('informasiPegawai/ijazah')->with('success','Data berhasil dihapus');
    }

    public function sertifikat(){
        $sertifikat = DB::table('tb_sertifikat')->get();
        return view("informasiPegawai.sertifikat",["sertifikat" => $sertifikat]);
    }

    public function sertifikatCreate(){
        $kepegawaian = DB::table('tb_login')->where('role','kepegawaian')->get();
        return view("informasiPegawai.sertifikatCreate",["kepegawaian" => $kepegawaian]);
    }

    public function sertifikatStore(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);
        $sertifikat = new Sertifikat();
        $sertifikat->nuptk = $request->nuptk;
        $pdfName = time().'.'.$request->pdf->extension();  
   
        $request->pdf->move(public_path('assets/files/sertifikat/'), $pdfName);
        $sertifikat->sertifikat = $pdfName;
        $sertifikat->save();
        
        return redirect('informasiPegawai/sertifikat')->with('success','Sertifikat berhasil diupload');
    }

    public function sertifikatDestroy($sertifikat)
    {
        \File::delete(public_path('assets/files/sertifikat/'.$sertifikat));
        DB::table('tb_sertifikat')->where('sertifikat',$sertifikat)->delete();
        return redirect('informasiPegawai/sertifikat')->with('success','Data berhasil dihapus');
    }

    public function sk(){
        $sk = DB::table('tb_sk')->get();
        return view("informasiPegawai.sk",["sk" => $sk]);
    }

    public function createSk(){
        $kepegawaian = DB::table('tb_login')->where('role','kepegawaian')->get();
        return view("informasiPegawai.skCreate",["kepegawaian" => $kepegawaian]);
    }

    public function skStore(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);
        $sk = new SK();
        $sk->nuptk = $request->nuptk;
        $pdfName = time().'.'.$request->pdf->extension();  
   
        $request->pdf->move(public_path('assets/files/sk/'), $pdfName);
        $sk->sk = $pdfName;
        $sk->save();
        
        return redirect('informasiPegawai/sk')->with('success','SK berhasil diupload');
    }

    public function skDestroy($sk){
        \File::delete(public_path('assets/files/sk/'.$sk));
        DB::table('tb_sk')->where('sk',$sk)->delete();
        return redirect('informasiPegawai/sk')->with('success','Data berhasil dihapus');
    }

    public function lengkapiData($id){
        $data = [
            "user" => DB::table('tb_login')->where('id',$id)->first()
        ];
        return view("informasiPegawai.lengkapiData",$data);
    }

    public function lengkapiDataPegawai(Request $request){
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
        $user = User::find($request->id);
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
        return redirect('informasiPegawai')->with('success','Data berhasil diupdate');
    }

}
