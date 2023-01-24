<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Kategori;


use Illuminate\Http\Request;
use App\Models\Data_kendaraan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ParkirController extends Controller
{
    public function viewMasuk(){
        $kategori = Kategori::select('id', 'nama_kategori')->get();
        
        
        return view('/parkir/masuk', ['kategori'=>$kategori]);
    }
    public function viewKeluar(Request $request){
        $parkirKeluar = Data_kendaraan::with('kendaraan')->get();
        
        $cari = $request->cari;
        $cari_fil = str_replace(" ", "", $cari);
        $cari = $cari_fil;
        $out = Data_kendaraan::where('No_pol', '=', $cari)
                    ->where('status_parkir', '=', 'masuk')
                    ->get();
        return view('/parkir/keluar', ['parkirkeluarList'=>$out]);
    }
    // public function viewBayar(){

        
        
    //     return view('/parkir/bayar');
    // }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'No_pol' => ['required', 'string', 'max:20'],
            'id_kategori' => 'required|in:1,2,3,4,5',
            'jam_masuk' =>['required']
            
        ]);
        $No_pol = strtoupper($request->No_pol);
        $no_space = str_replace(" ", "", $No_pol);
        $jam_keluar = Data_kendaraan::get();
        
        $val2 = DB::table('data_kendaraans')
                    ->where('No_pol', $request->No_pol)
                    ->where('status_parkir', 'masuk')
                    ->get();
        
        foreach ($val2 as $key => $value) {
            $No_pol = $value->No_pol;     
            $jam_keluar = $value->status_parkir;
            
        }
        // dd($statusMasuk);
        $cekMember = DB::table('members')
                            ->where('No_pol', $request->No_pol)
                            ->get();
        foreach ($cekMember as $key => $value) {
            $cekMem = $value->No_pol;     
                     
        }
        // dd($cekMem);
        if (!empty($No_pol) && $jam_keluar === 'masuk') {
            
            return redirect()->route('parkir.masuk')
             ->with('gagal','Kendaraan Belom Keluar.');

        } else {
            $cekMember = DB::table('members')
                            ->where('No_pol', $request->No_pol)
                            ->get();

            foreach ($cekMember as $key => $value) {
                $cekMem = $value->No_pol;     
                         
            }
            // dd($cekMember);
            if (empty($cekMem)) {
                $member = "non-member";
            } else {
                $member = "member";
            }
             Data_kendaraan::create([
                'No_pol' => $no_space,
                'id_kategori' => $request->id_kategori,
                'jam_masuk' => $request->jam_masuk,
                'id_user'     => Auth::user()->id,
                'status_member'  => $member,
            ]);
    
           
            return redirect()->route('parkir.masuk')
                            ->with('success','parkirmasuk created successfully.');
         }   
              
        
        
    }

    public function Bayar(Request $request, $id)
    {

        $Data_kendaraan = Data_kendaraan::findOrfail($id);
        $kategori = Kategori::get();
        return view('/parkir/bayar', ['Data_kendaraan'=> $Data_kendaraan, 'kategori' => $kategori]);
        
    }
    public function detBayar(Request $request, $id)
    {

        $Data_kendaraan = Data_kendaraan::findOrfail($id);
        $kategori = Kategori::get();
        return view('/parkir/detBayar', ['Data_kendaraan'=> $Data_kendaraan, 'kategori' => $kategori]);
        
    }



    public function bayarParkir(Request $request, $id){
        
        $request->validate([
            'No_pol' => ['required', 'string', 'max:20'],
            'id_kategori' => ['required'],
            'jam_masuk' =>['required'],
            'jam_keluar' => ['required']
        ]);
    
        $Data_kendaraan = Data_kendaraan::findOrfail($id);
        if ($Data_kendaraan['status_member'] === 'member') {
            $bayar = 0;
        } else {
            $masuk = strtotime($request->jam_masuk);
            $keluar = strtotime($request->jam_keluar);
            $hasil = $keluar-$masuk;
            $jam   = ceil($hasil / (60 * 60));
            $bayar = $jam*$Data_kendaraan->kendaraan->harga_jam;
        }

        $Data_kendaraan->update([
            'jam_keluar' => $request->jam_keluar,
            'bayar' => $bayar,
            'id_user' => Auth::user()->id,
            'status_parkir' => $request->status_parkir,
            
            
        ]);
        $Data_kendaraan = Data_kendaraan::findOrfail($id);
        $kategori = Kategori::get();
        return view('/parkir/detBayar', ['Data_kendaraan'=> $Data_kendaraan, 'kategori' => $kategori]);
        
    }

    public function riwayat()
    {
        $riwayatParkir = Data_kendaraan::with(['kendaraan', 'petugas'])->where('status_parkir', '=', 'keluar')->get();
        
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y'),
        //     'users' => $riwayatParkir
        // ]; 
        // return view('students.index',compact('students'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('/parkir/riwayatParkir', ['riwayatParkir' => $riwayatParkir]);
    }

    public function generatePDFparkir()
    {
        $riwayatParkir = Data_kendaraan::with(['kendaraan', 'petugas'])->where('status_parkir', '=', 'keluar')->get();
  
        $data = [
            'title' => 'Laporan Parkir',
            'date' => date('m/d/Y'),
            'riwayatParkir' => $riwayatParkir
        ]; 
            
        $pdf = PDF::loadView('/parkir/riwayatParkirPDF', $data);
     
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('RiwayatParkir.pdf');
    }
    

    public function refund(Request $request, $id)
    {
        $Data_kendaraan = Data_kendaraan::findOrfail($id);
        
        // dd($request->refund);
        $kembali = $request->refund-$Data_kendaraan->bayar;
        // dd($kembali);
        $kategori = Kategori::get();
        return view('/parkir/refund', ['Data_kendaraan'=> $Data_kendaraan, 'kategori' => $kategori, 'kembali' => $kembali]);
        
    }
}
