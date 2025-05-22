<?php

namespace App\Http\Controllers;

use App\Models\Lop;
use Illuminate\Http\Request;
use App\Models\SinhVien;
class ThemQLSVController extends Controller
{

    // Hiển thị form thêm sinh viên
    public function themqlsv()
    { $ds_lop = Lop::all(); // để chọn lớp trong form sửa
        $ds_sinhvien = SinhVien::with('lop')->get(); // thêm dòng này
             return view('themqlsv', compact( 'ds_lop', 'ds_sinhvien')); // truyền đầy đủ
  
    }

    // Xử lý lưu sinh viên mới
    public function store(Request $request)
    {
        $request->validate([
            'masv' => 'required|string',
            'hoten' => 'required|string',
            'ngaysinh' => 'required|date',
            'gioitinh' => 'required|in:Nam,Nữ',
            'email' => 'required|string',
            'sdt' => 'required|string',
            'id_lop' => 'required|integer',
        ]);

        SinhVien::create($request->all());

        return redirect()->route('sinhvien.index');
    }
}
