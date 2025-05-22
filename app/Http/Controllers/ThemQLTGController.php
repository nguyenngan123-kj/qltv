<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TacGia;
class ThemQLTGController extends Controller
{

    // Hiển thị form thêm tác giả
    public function themqltg()
    {
        return view('themqltg');
    }

    // Xử lý lưu tác giả mới
    public function store(Request $request)
    {
        $request->validate([
            'matg' => 'required|string',
            'tentg' => 'required|string',
            'namsinh' => 'required|date',
            'quoctich' => 'required|string',
        ]);

        TacGia::create($request->all());

        return redirect()->route('tacgia.index');  // hoặc route bạn dùng để danh sách tác giả
    }
}
