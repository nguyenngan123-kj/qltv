<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class ThemQLTKADController extends Controller
{
     // Hiển thị form thêm thể loại
    public function themqlad()
    {
        return view('themqlad'); // view form nhập liệu
    }

    // Xử lý lưu dữ liệu từ form
    public function store(Request $request)
    {
        $request->validate([
           'ten_ad' => 'required|string|max:255',
            'mk_ad' => 'required|string|max:255',
        ]);

        Admin::create($request->all());

        return redirect()->route('qladmin.index'); // đổi route phù hợp
    }
}
