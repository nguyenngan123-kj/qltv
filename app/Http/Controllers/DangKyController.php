<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\DocGia;
use App\Models\Lop;

class DangKyController extends Controller
{
    // Hiển thị form đăng ký
    public function show()
    {
        $dslop = Lop::all(); // Lấy danh sách lớp từ DB
        return view('dangky', compact('dslop'));
    }

    // Xử lý lưu thông tin đăng ký
    public function store(Request $request)
    {
        $validated = $request->validate([
            'masv' => 'required|string',
            'hoten' => 'required|string',
            'matkhau' => 'required|string|min:6',
            'ngaysinh' => 'required|date',
            'gioitinh' => 'required|string',
            'email' => 'required|string',
            'sdt' => 'required|string',
            'id_lop' => 'required|string'
        ]);

        // Tạo sinh viên
        $sv = SinhVien::create([
            'masv' => $request->masv,
            'hoten' => $request->hoten,
            'ngaysinh' => $request->ngaysinh,
            'gioitinh' => $request->gioitinh,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'id_lop' => $request->id_lop,
        ]);

        // Tạo tài khoản đọc giả
        DocGia::create([
            'ten_dg' => $request->hoten,
            'mk_dg' => $request->matkhau,
              'id_sv' => $sv->id_sv,
        ]);

        // Chuyển đến trang đăng nhập nếu thành công
        return redirect()->route('dangnhap')->with('success', 'Đăng ký thành công!');
    }
}
