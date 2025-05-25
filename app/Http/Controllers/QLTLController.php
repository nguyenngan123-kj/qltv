<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;

class QLTLController extends Controller
{
    
    // Hiển thị danh sách thể loại
     public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');

        if ($tukhoa) {
            $ds_tl = TheLoai::where('matl', 'like', "%$tukhoa%")
                ->orWhere('tentl', 'like', "%$tukhoa%")
                ->get();
        } else {
            $ds_tl = TheLoai::all();
        }

        return view('qltl', compact('ds_tl', 'tukhoa'));
    }

    // Truy vấn và hiển thị form cập nhật thể loại
    public function edit($id_tl)
    {
        $theloai = TheLoai::findOrFail($id_tl);
        $ds_tl = TheLoai::all(); // nếu cần hiển thị danh sách luôn
        return view('qltl', compact('theloai', 'ds_tl'));
    }

    // Cập nhật thông tin thể loại
    public function update(Request $request, $id_tl)
    {
        $request->validate([
            'matl' => 'required|string',
            'tentl' => 'required|string',
        ]);

        $theloai = TheLoai::findOrFail($id_tl);
        $theloai->update($request->all());

        return redirect()->route('theloai.index');
    }

    // Xóa thể loại
    public function destroy($id_tl)
    {
        $theloai = TheLoai::findOrFail($id_tl);
        $theloai->delete();

        return redirect()->route('theloai.index');
    }
}
