<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\Lop;
class QLSVController extends Controller
{

    // Hiển thị danh sách sinh viên
     public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');

        if ($tukhoa) {
            $ds_sinhvien = SinhVien::with('lop')
                ->where('masv', 'like', "%$tukhoa%")
                ->orWhere('hoten', 'like', "%$tukhoa%")
               
                ->get();
        } else {
            $ds_sinhvien = SinhVien::with('lop')->get(); // lấy kèm thông tin lớp
        }

        return view('qlsv', compact('ds_sinhvien', 'tukhoa'));
    }

    // Sửa thông tin sinh viên
    public function edit($id_sv)
    {
        $sinhvien = SinhVien::findOrFail($id_sv);
        $ds_lop = Lop::all(); // để chọn lớp trong form sửa
        $ds_sinhvien = SinhVien::with('lop')->get(); // thêm dòng này
    return view('qlsv', compact('sinhvien', 'ds_lop', 'ds_sinhvien')); // truyền đầy đủ
       
    }

    // Cập nhật sinh viên
    public function update(Request $request, $id_sv)
    {
        $request->validate([
            'masv' => 'required|string|max:20',
            'hoten' => 'required|string|max:100',
            'ngaysinh' => 'required|date',
            'gioitinh' => 'required|in:Nam,Nữ',
            'email' => 'required|string',
            'sdt' => 'required|string',
            'id_lop' => 'required|integer',
        ]);

        $sinhvien = SinhVien::findOrFail($id_sv);
        $sinhvien->update($request->all());

        return redirect()->route('sinhvien.index');
    }

    // Xóa sinh viên
    public function destroy($id_sv)
    {
        $sinhvien = SinhVien::findOrFail($id_sv);
        $sinhvien->delete();

        return redirect()->route('sinhvien.index');
    }
}
