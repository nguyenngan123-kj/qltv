<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class QLTKADController extends Controller
{

    // Hiển thị danh sách tài khoản admin
    public function index()
    {
        $ds_ad = Admin::all();
        return view('qlad', compact('ds_ad'));
    }

    // Hiển thị form cập nhật tài khoản admin
    public function edit($id_ad)
    {
        $taikhoan = Admin::findOrFail($id_ad);
        $ds_ad = Admin::all(); // để hiển thị luôn danh sách
        return view('qlad', compact('taikhoan', 'ds_ad'));
    }

    // Cập nhật thông tin tài khoản admin
    public function update(Request $request, $id_ad)
    {
        $request->validate([
            'ten_ad' => 'required|string|max:255',
            'mk_ad' => 'required|string|max:255',
        ]);

        $taikhoan = Admin::findOrFail($id_ad);
        $taikhoan->update($request->all());

        return redirect()->route('qladmin.index');
    }

    // Xóa tài khoản admin
    public function destroy($id_ad)
    {
        $taikhoan = Admin::findOrFail($id_ad);
        $taikhoan->delete();

        return redirect()->route('qladmin.index');
    }
}
