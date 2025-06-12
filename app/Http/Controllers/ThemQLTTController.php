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
            'hinhtt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
 $data = $request->all();

    if ($request->hasFile('hinhtt')) {
        $file = $request->file('hinhtt');
        $filename = time() . '_' . $file->getClientOriginalName(); // để tránh trùng tên
        $file->move(public_path('hinhanh'), $filename);
        $data['hinhtt'] = 'hinhanh/' . $filename;
    }
    TinTuc::create($request->all());

    return redirect()->route('tintuc.index')->with('success', 'Cập nhật thành công!');
    }
}
