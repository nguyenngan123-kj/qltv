<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
class ThemQLTTController extends Controller
{
    // Hiển thị form thêm thể loại
    public function themqltt()
    {
        return view('themqltt'); // view form nhập liệu
    }

    // Xử lý lưu dữ liệu từ form
    public function store(Request $request)
    {
        
         $request->validate([
            'tieude' => 'required|string',
            'trichdan' => 'required|string',
            'link' => 'required|string',
            'ngaydang' => 'required|date',
            'hinhtt' => 'required|string',
        ]);

        TinTuc::create($request->all());

        return redirect()->route('tintuc.index'); // đổi route phù hợp
    }
}
