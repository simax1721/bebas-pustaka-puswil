<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    function index()
    {
        return view('administrator.rekap.index');
    }
}
