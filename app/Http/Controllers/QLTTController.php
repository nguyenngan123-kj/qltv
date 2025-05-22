<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
class QLTTController extends Controller
{

    // Hiển thị danh sách tin tức
    public function index()
    {
        $ds_tt = TinTuc::all();
        return view('qltt', compact('ds_tt'));
    }

    // Hiển thị form cập nhật tin tức
    public function edit($id_tt)
    {
        $tintuc = TinTuc::findOrFail($id_tt);
        $ds_tt = TinTuc::all(); // nếu cần hiển thị danh sách
        return view('qltt', compact('tintuc', 'ds_tt'));
    }

    // Cập nhật thông tin tin tức
    public function update(Request $request, $id_tt)
    {
        $request->validate([
            'tieude' => 'required|string',
            'trichdan' => 'required|string',
            'link' => 'required|string',
            'ngaydang' => 'required|date',
            'hinhtt' => 'required|string',
        ]);

        $tintuc = TinTuc::findOrFail($id_tt);
        $tintuc->update($request->all());

        return redirect()->route('tintuc.index');
    }

    // Xóa tin tức
    public function destroy($id_tt)
    {
        $tintuc = TinTuc::findOrFail($id_tt);
        $tintuc->delete();

        return redirect()->route('tintuc.index');
    }
}
