<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
class QLTTController extends Controller
{

    // Hiển thị danh sách tin tức
     public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');

        if ($tukhoa) {
            $ds_tt = TinTuc::where('tieude', 'like', "%$tukhoa%")
                        ->orWhere('trichdan', 'like', "%$tukhoa%")
                        ->get();
        } else {
            $ds_tt = TinTuc::all();
        }

        return view('qltt', compact('ds_tt', 'tukhoa'));
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
        'hinhtt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $tintuc = TinTuc::findOrFail($id_tt);
    $data = $request->only(['tieude','trichdan','link','ngaydang']);

    if ($request->hasFile('hinhtt')) {
        $file = $request->file('hinhtt');
        $filename = time() . '_' . $file->getClientOriginalName(); // để tránh trùng tên
        $file->move(public_path('hinhanh'), $filename);
        $data['hinhtt'] = 'hinhanh/' . $filename;
    }

    $tintuc->update($data);

    return redirect()->route('tintuc.index')->with('success', 'Cập nhật thành công!');
}


    // Xóa tin tức
    public function destroy($id_tt)
    {
        $tintuc = TinTuc::findOrFail($id_tt);
        $tintuc->delete();

        return redirect()->route('tintuc.index');
    }
}
