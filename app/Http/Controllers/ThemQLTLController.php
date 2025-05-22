<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
class ThemQLTLController extends Controller
{

    // Hiển thị form thêm thể loại
    public function themqltl()
    {
        return view('themqltl'); // view form nhập liệu
    }

    // Xử lý lưu dữ liệu từ form
    public function store(Request $request)
    {
        $request->validate([
            'matl' => 'required|string',
            'tentl' => 'required|string',
        ]);

        TheLoai::create($request->all());

        return redirect()->route('theloai.index'); // đổi route phù hợp
    }
}
