<?php

namespace App\Http\Controllers;
use App\Models\NhanXet;
use Illuminate\Http\Request;

class ThemQLNXController extends Controller
{
    //
     public function store(Request $request)
    {
        $request->validate([
            'id_dg' => 'required|integer',
            'id_sach' => 'required|integer',
            'nhanxt' => 'required|string',
        ]);

        NhanXet::create([
            'id_dg' => $request->id_dg,
            'id_sach' => $request->id_sach,
            'nhanxt' => $request->nhanxt,
        ]);

        return redirect()->route('nhanxet.index');
    }

    public function themqlnx()
    {
        return view('themqlnx');
    }
}


