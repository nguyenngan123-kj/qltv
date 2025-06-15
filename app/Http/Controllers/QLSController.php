<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\TacGia;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SachExport;
use App\Models\NhanXet;
use Illuminate\Support\Facades\DB;
use App\Exports\ThongKeTheLoaiExport;


class QLSController extends Controller
{

    
    // Danh sách sách có tìm kiếm
    public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');
        if ($tukhoa) {
        // Nếu từ khóa là số và là tháng hợp lệ (1-12)
        if (is_numeric($tukhoa) && $tukhoa >= 1 && $tukhoa <= 12) {
            $month = (int)$tukhoa;
             $ds_sach =Sach::join('tacgia', 'tacgia.id_tg', '=', 'sach.id_tg')
             ->join('theloai', 'theloai.id_tl', '=', 'sach.id_tl')
                ->whereMonth('sach.ngaynhap', $month)
                ->select('sach.*', 'tacgia.tentg', 'theloai.tentl')
                ->get();

        }
        else {
            $ds_sach = Sach::where('masach', 'like', "%$tukhoa%")
                ->orWhere('tensach', 'like', "%$tukhoa%")
                ->orWhere('nxb', 'like', "%$tukhoa%")
                ->get();
        }
     } else {
            $ds_sach = Sach::join('tacgia', 'tacgia.id_tg', '=', 'sach.id_tg')
             ->join('theloai', 'theloai.id_tl', '=', 'sach.id_tl')
            ->select('sach.*', 'tacgia.tentg', 'theloai.tentl')
            ->get();
        }

        return view('qls', compact('ds_sach', 'tukhoa'));
      }

      //xuất dữu liệu
public function export(Request $request)
{
    $tukhoa = $request->input('tukhoa');

    $query = Sach::join('tacgia', 'tacgia.id_tg', '=', 'sach.id_tg')
             ->join('theloai', 'theloai.id_tl', '=', 'sach.id_tl')
            ->select('sach.*', 'tacgia.tentg', 'theloai.tentl');

    if ($tukhoa) {
        if (is_numeric($tukhoa) && $tukhoa >= 1 && $tukhoa <= 12) {
            $query->whereMonth('sach.ngaynhap', (int)$tukhoa);
        } else {
            $query->where(function ($q) use ($tukhoa) {
                $q->where('masach', 'like', "%$tukhoa%")
                ->orWhere('tensach', 'like', "%$tukhoa%")
                ->orWhere('nxb', 'like', "%$tukhoa%");
            });
        }
    }

    $data = $query->get();

    return Excel::download(new SachExport($data), 'danh_sach_sach.xlsx');
}



    // Form sửa sách
public function edit($id_sach)
{
    $sach = Sach::findOrFail($id_sach);
    $ds_tg = TacGia::all();
    $ds_tl = TheLoai::all();
    $ds_sach = Sach::all(); // nếu vẫn muốn giữ danh sách sách

    return view('qls', compact('sach', 'ds_sach', 'ds_tg', 'ds_tl'));
}

    // Cập nhật sách
public function update(Request $request, $id_sach)
{
    $validated = $request->validate([
        'masach'    => 'required|string|max:50',
        'tensach'   => 'required|string|max:255',
        'id_tg'     => 'required|integer',
        'id_tl'     => 'required|integer',
        'nxb'       => 'required|string|max:100',
        'ngaynhap'  => 'required|date',
        'soluong'   => 'required|integer|min:1',
        'link'      => 'required|string|max:255',
          'hinhsach'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $sach = Sach::findOrFail($id_sach);
        $data = $request->only(['masach', 'tensach', 'id_tg', 'id_tl', 'nxb', 'ngaynhap', 'soluong', 'link']);
    if ($request->hasFile('hinhsach')) {
        $file = $request->file('hinhsach');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('hinhanh'), $filename);

        // Xóa ảnh cũ nếu tồn tại
        if ($sach->hinhsach && file_exists(public_path($sach->hinhsach))) {
            unlink(public_path($sach->hinhsach));
        }

        $data['hinhsach'] = 'hinhanh/' . $filename;
    }
    $sach->update($data);
    return redirect()->route('sach.index')->with('success', 'Cập nhật sách thành công!');
}



    // Xóa sách
    public function destroy($id_sach)
    {
        $sach = Sach::findOrFail($id_sach);
        $sach->delete();
        return redirect()->route('sach.index');
    }



    //thống kê thoe thể loại
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

    return view('tktheloaisach', [

     'labelsJson' => json_encode($labels),
        'countsJson' => json_encode($counts),
        'data' => ($data),
        
    ]); 
}
public function exportThongKeTheLoai()
{
    $data = Sach::select('id_tl', DB::raw('count(*) as soluong'))
        ->groupBy('id_tl')
        ->with('theloai')
        ->get();

    return Excel::download(new ThongKeTheLoaiExport($data), 'thong_ke_theloai.xlsx');
}
}

  