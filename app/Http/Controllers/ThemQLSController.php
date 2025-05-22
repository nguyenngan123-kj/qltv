<?php

namespace App\Http\Controllers;
use App\Models\Sach;
use Illuminate\Http\Request;

class ThemQLSController extends Controller
{
    //
    public function themqls()
{
    return view('themqls');
}

public function store(Request $request)
{
    $request->validate([
         'masach' => 'required',
        'tensach' => 'required',
        'id_tg' => 'required|integer',
        'id_tl' => 'required|integer',
        'nxb' => 'required|string',
        'ngaynhap' => 'required|date',
        'soluong' => 'required|integer',
        'hinhsach' => 'required|string',
        'link' => 'required|string',
    ]);

    Sach::create($request->all());

        return redirect()->route('sach.index');
    
}

}
