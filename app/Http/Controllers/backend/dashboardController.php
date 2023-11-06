<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\Paket;
use App\Models\Pelanggan;

use Illuminate\Support\Carbon;


class dashboardController extends Controller
{
    public function index()
    {
        $totalDataPelanggan = Pelanggan::count();
        $totalDataPaket = Paket::count();
        $totalDataPesanan = Pesan::count();
    
        // Calculate the total orders for the current month and year
        $now = Carbon::now();
        $yesterday = Carbon::yesterday();
        $totalPesananKemarin = Pesan::whereDate('tgl_pesan', $yesterday)->count();
        $totalPesananHariIni = Pesan::whereDate('tgl_pesan', $now)->count();
        $totalPesananBulanIni = Pesan::whereMonth('tgl_pesan', $now->month)->whereYear('tgl_pesan', $now->year)->count();
        $totalPesananTahunIni = Pesan::whereYear('tgl_pesan', $now->year)->count();
    
        return view('backend.index', compact('totalDataPesanan', 'totalDataPaket', 'totalDataPelanggan', 'totalPesananHariIni', 'totalPesananBulanIni', 'totalPesananTahunIni','totalPesananKemarin'));
    }
    
}
