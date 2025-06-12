<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuonTra;
use App\Models\Sach;
use App\Models\DocGia;
class ThemQLMTController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'id_dg' => 'required|integer',
            'id_sach' => 'required|integer',
            'ngaymuon' => 'required|date',
            'ngaytra' => 'required|date',
            'ghichu' => 'required|string',
        ]);

        MuonTra::create($request->all());
           
        return redirect()->route('muontra.index');
    }

   public function themqlmt()
{
    $ds_dg = DocGia::all();
    $ds_s = Sach::all();
    return view('themqlmt', compact('ds_dg', 'ds_s'));
}

}
