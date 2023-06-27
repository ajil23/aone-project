<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function PenggunaView(){
        $data['allDataPengguna']=Pengguna::all();
        return view('backend.pengguna.view_pengguna', $data);
    }
}
