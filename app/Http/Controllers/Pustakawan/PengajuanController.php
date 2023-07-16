<?php

namespace App\Http\Controllers\Pustakawan;

use App\Http\Controllers\Controller;
use App\Models\Biodatapustakawan;
use App\Models\Pengajuanbebaspustaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    function index()
    {
        $cekpengajuan = Pengajuanbebaspustaka::where('users_id', '=', Auth::user()->id)->get();
        $biodata = Biodatapustakawan::where('users_id', '=', Auth::user()->id)->first();

        if (count($cekpengajuan) == 0) {
            $pengajuandata = "";
            $pengajuan = 'pustakawan.pengajuan.addpengajuan';
        } else {
            $pengajuandata = Pengajuanbebaspustaka::where('users_id', '=', Auth::user()->id)->first();
            $pengajuan = 'pustakawan.pengajuan.donepengajuan';
        }

        return view('pustakawan.pengajuan.based', compact('pengajuandata', 'pengajuan', 'biodata'));
    }

    function store(Request $request)
    {
        Pengajuanbebaspustaka::create([
            'biodatapustakawans_id' => $request->biodatapustakawans_id,
            'users_id' => $request->users_id,
        ]);

        return redirect()->back()->with('success', 'Pengajuan sudah dikirim, silakan cek ke Kantor!');
    }
}
