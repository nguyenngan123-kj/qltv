<?php

namespace App\Http\Controllers;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\TacGia;
use Illuminate\Http\Request;

class ThemQLSController extends Controller
{
    //
    public function themqls()
{
     $ds_tg = TacGia::all();
    $ds_tl = TheLoai::all();
    return view('themqls', compact('ds_tg', 'ds_tl'));
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
        'hinhsach'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'link' => 'required|string',
    ]);

     $data = $request->all();
    if ($request->hasFile('hinhsach')) {
        $file = $request->file('hinhsach');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('hinhanh'), $filename);
        $data['hinhsach'] = 'hinhanh/' . $filename;
    }

  Sach::create($data);
    return redirect()->route('sach.index')->with('success', 'Thêm sách thành công!');
   }

}
