<?php

namespace App\Http\Controllers;
use App\Models\DocGia;
use Illuminate\Http\Request;

class QLTKDGController extends Controller
{

    // Hiển thị danh sách tài khoản độc giả
    public function index()
    {
        $ds_dg = DocGia::all();
        return view('qldg', compact('ds_dg'));
    }

    // Hiển thị form cập nhật tài khoản độc giả
    public function edit($id_dg)
    {
        $taikhoan = DocGia::findOrFail($id_dg);
        $ds_dg = DocGia::all(); // để hiển thị luôn danh sách
        return view('qldg', compact('taikhoan', 'ds_dg'));
    }

    // Cập nhật thông tin tài khoản độc giả
    public function update(Request $request, $id_dg)
    {
        $request->validate([
            'ten_dg' => 'required|string|max:255',
            'mk_dg'  => 'required|string|max:255',
            'id_sv'  => 'required|integer',
        ]);

        $taikhoan = DocGia::findOrFail($id_dg);
        $taikhoan->update($request->all());

        return redirect()->route('qldocgia.index');
    }

    // Xóa tài khoản độc giả
    public function destroy($id_dg)
    {
        $taikhoan = DocGia::findOrFail($id_dg);
        $taikhoan->delete();

        return redirect()->route('qldocgia.index');
    }
}
