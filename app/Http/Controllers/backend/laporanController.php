<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;
use PDF;

class laporanController extends Controller
{
   public function index(){
    return view('admin.laporan.index');
   }
public function show(Request $request)
{
    $request->validate([
        'tgl_awal' => 'required|date',
        'tgl_akhir' => 'required|date',
        
    ], $messages =[
        'tgl_awal.required' => 'Tanggal harus diisi',
        'tgl_akhir.required' => 'Tanggal harus diisi'


]);
    $tgl_awal = $request->input('tgl_awal');
    $tgl_akhir = $request->input('tgl_akhir');

    $laporan = Pesan::whereBetween('tgl_pesan', [$tgl_awal, $tgl_akhir])->get();

    return view('admin.laporan.show', compact('laporan', 'tgl_awal', 'tgl_akhir'));
}
public function download(Request $request)
{
    $tgl_awal = $request->input('tgl_awal');
    $tgl_akhir = $request->input('tgl_akhir');

    $laporan = Pesan::whereBetween('tgl_pesan', [$tgl_awal, $tgl_akhir])->get();

    $pdf = PDF::loadView('admin.laporan.show', compact('laporan', 'tgl_awal', 'tgl_akhir'))->setPaper('A4', 'landscape');

    $filename = 'laporan_' . \Carbon\Carbon::parse($tgl_awal)->format('Y-m-d') . '_' . \Carbon\Carbon::parse($tgl_akhir)->format('Y-m-d') . '.pdf';

    return $pdf->download($filename);
}


}
