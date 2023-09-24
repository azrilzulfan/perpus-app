<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PetugasModel;
use App\Models\PinjamModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function jumlah()
    {
        $jumlahBuku = BukuModel::count();
        $jumlahAnggota = AnggotaModel::count();
        $jumlahPetugas = PetugasModel::count();
        $jumlahPinjam = PinjamModel::count();
        return view('dashboard', compact('jumlahBuku','jumlahAnggota','jumlahPetugas','jumlahPinjam'));
    }
}
