<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
class QLSController extends Controller
{
      // Danh sách sách
    public function index()
    {
        $ds_sach = Sach::all();
        return view('qls', compact('ds_sach'));
    }

    // Form sửa sách
    public function edit($id_sach)
    {
        $sach = Sach::findOrFail($id_sach);
        $ds_sach = Sach::all(); // nếu cần hiển thị danh sách
        return view('qls', compact('sach', 'ds_sach'));
    }

    // Cập nhật sách
    public function update(Request $request, $id_sach)
    {
        $request->validate([
            'masach' => 'required|string',
            'tensach' => 'required|string',
            'id_tg' => 'required|integer',
            'id_tl' => 'required|integer',
            'nxb' => 'required|string',
            'ngaynhap' => 'required|date',
            'soluong' => 'required|integer',
            'hinhsach' => 'required|string',
            'link' => 'required|string',
        ]);

        $sach = Sach::findOrFail($id_sach);
        $sach->update($request->all());
        return redirect()->route('sach.index');
    }

    // Xóa sách
    public function destroy($id_sach)
    {
        $sach = Sach::findOrFail($id_sach);
        $sach->delete();
        return redirect()->route('sach.index');
    }
}

  