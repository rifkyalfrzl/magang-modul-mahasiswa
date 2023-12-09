<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function beranda(){
        return view('pages.beranda');
    }
    function tentangMagang(){
        return view('pages.tentang_magang');
    }
    function panduanMagang(){
        return view('pages.panduan_magang');
    }
    function tahapPendaftaran(){
        return view('pages.tahap_pendaftaran');
    }
    function pendaftaranMagang(){
        return view('pages.pendaftaran_magang');
    }
    function tahapPersiapan(){
        return view('pages.tahap_persiapan');
    }
    function plotPembimbing(){
        return view('pages.plot_pembimbing');
    }
    function tahapPelaksanaan(){
        return view('pages.tahap_pelaksanaan');
    }
    function loginPage(){
        return view('sesi.login');
    }
}
