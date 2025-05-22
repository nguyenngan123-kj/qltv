<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TacGia;

class QLTGController extends Controller
{
    // Hiển thị danh sách tác giả
    public function index()
    {
        $ds_tg = TacGia::all();
        return view('qltg', compact('ds_tg'));
    }

    // Truy vấn và hiển thị form cập nhật tác giả
    public function edit($id_tg)
    {
        $tacgia = TacGia::findOrFail($id_tg);
        $ds_tg = TacGia::all(); // nếu cần hiển thị danh sách luôn
        return view('qltg', compact('tacgia', 'ds_tg'));
    }

    // Cập nhật thông tin tác giả
    public function update(Request $request, $id_tg)
    {
        $request->validate([
            'matg' => 'required|string',
            'tentg' => 'required|string',
            'namsinh' => 'required|date',
            'quoctich' => 'required|string',
        ]);

        $tacgia = TacGia::findOrFail($id_tg);
        $tacgia->update($request->all());

        return redirect()->route('tacgia.index');
    }

    // Xóa tác giả
    public function destroy($id_tg)
    {
        $tacgia = TacGia::findOrFail($id_tg);
        $tacgia->delete();

        return redirect()->route('tacgia.index');
    }
}
