<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\Lop;
use App\Models\DocGia;
use Illuminate\Support\Facades\DB;

class TaiKhoanController extends Controller
{
    // Hiển thị form sửa thông tin sinh viên
 public function showForm()
{
    // Lấy id_dg từ session (giả sử bạn đã đăng nhập)
    $id_dg = session('id_dg');

    // Join bảng sinhvien với tkdocgia theo id_dg
    $sinhvien = DB::table('sinhvien')
        ->join('tkdocgia', 'sinhvien.id_sv', '=', 'tkdocgia.id_sv')
        ->where('tkdocgia.id_dg', $id_dg)
        ->select('sinhvien.*') // lấy toàn bộ cột từ bảng sinhvien
        ->first();

    // Lấy danh sách lớp
    $dslop = Lop::all();

    // Nếu không tìm thấy sinh viên
    if (!$sinhvien) {
        return redirect()->back()->with('error', 'Không tìm thấy sinh viên.');
    }

    return view('taikhoan', [
        'sinhvien' => $sinhvien,
        'dslop' => $dslop,
        'id_sv' => $sinhvien->id_sv,
    ]);
}

    // Xử lý cập nhật thông tin
    public function capNhat(Request $request, $id_sv)
    {
        $sinhvien = SinhVien::findOrFail($id_sv);

        $sinhvien->masv = $request->input('masv');
        $sinhvien->hoten = $request->input('hoten');
        $sinhvien->ngaysinh = $request->input('ngaysinh');
        $sinhvien->gioitinh = $request->input('gioitinh');
        $sinhvien->email = $request->input('email');
        $sinhvien->sdt = $request->input('sdt');
        $sinhvien->id_lop = $request->input('lop');
        $sinhvien->save();

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }
}
