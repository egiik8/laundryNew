<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\Paket;

class homeController extends Controller
{
    public function index(){
        $dataPaket = Paket::orderBy('created_at', 'desc')->paginate(5);
        return view ('frontend.index', compact('dataPaket'));
    }
    // public function lacakPesanan(Request $request) {
    //     $kd_transaksi = $request->input('kd_transaksi'); 
    //     $pesanData = Pesan::where('kd_transaksi', $kd_transaksi)->get();
    //     return view('frontend.index', ['pesanData' => $pesanData]);
    // }

    public function lacakPesanan(Request $request) {
        $kd_transaksi = $request->input('kd_transaksi'); 
        $pesanData = Pesan::where('kd_transaksi', $kd_transaksi)->get();
        $dataPaket = Paket::orderBy('created_at', 'desc')->paginate(5);
        session(['dataPaket' => $dataPaket]);
        // return view('frontend.index', ['pesanData' => $pesanData]);
        return view('frontend.index', compact('dataPaket', 'pesanData')); // Menambahkan $dataPaket ke dalam compact
    }
    
    
}
