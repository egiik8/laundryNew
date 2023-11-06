<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;

class semuapaketController extends Controller
{
    public function index(){
        $dataPaket = Paket::orderBy('created_at', 'desc')->get();
        return view ('frontend.paket', compact('dataPaket'));
    }
}
