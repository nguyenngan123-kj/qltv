<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Support\Facades\DB;
class QLSController extends Controller
{

    
    // Danh sách sách có tìm kiếm
    public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');

        if ($tukhoa) {
            $ds_sach = Sach::where('masach', 'like', "%$tukhoa%")
                ->orWhere('tensach', 'like', "%$tukhoa%")
                ->orWhere('nxb', 'like', "%$tukhoa%")
                ->get();
        } else {
            $ds_sach = Sach::all();
        }

        return view('qls', compact('ds_sach', 'tukhoa'));
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
   public function thongKeTheLoai()
{
    $data = Sach::select('id_tl', DB::raw('count(*) as soluong'))
        ->groupBy('id_tl')
        ->with('theloai')
        ->get();

 
 // Tạo mảng labels (tên thể loại) và counts (số lượng)
    $labels = [];
    $counts = [];

    foreach ($data as $item) {
        $labels[] = $item->theloai->tentl?? 'Không xác định';
        $counts[] = $item->soluong;
    }

    return view('sachbd', [

     'labelsJson' => json_encode($labels),
        'countsJson' => json_encode($counts),
        'data' => ($data),
        
    ]); 
}
}

  