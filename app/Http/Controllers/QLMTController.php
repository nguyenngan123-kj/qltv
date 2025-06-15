<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuonTra;
use App\Models\Sach;
use App\Models\DocGia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MuonTraExport;
use App\Exports\ThongKeTheoThangExport;
use App\Exports\ThongKeHanNgayExport;
use App\Exports\ThongKeSachExport;

class QLMTController extends Controller
{
    /**
     * Hiển thị danh sách mượn-trả
     */
  
public function index(Request $request)
{
 $tukhoa = $request->input('tukhoa');

    if ($tukhoa) {
        // Nếu từ khóa là số và là tháng hợp lệ (1-12)
        if (is_numeric($tukhoa) && $tukhoa >= 1 && $tukhoa <= 12) {
            $month = (int)$tukhoa;
            $ds_muontra = MuonTra::join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
                ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'muontra.id_dg')
                ->whereMonth('muontra.ngaymuon', $month)
                ->select('muontra.*', 'tkdocgia.ten_dg', 'sach.tensach')
                ->get();
        } else {
            // Tìm theo id độc giả hoặc id sách
            $ds_muontra = MuonTra::join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
                ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'muontra.id_dg')
                ->where('tkdocgia.ten_dg', 'like', "%$tukhoa%")
                ->orWhere('sach.tensach', 'like', "%$tukhoa%")
                ->select('muontra.*', 'tkdocgia.ten_dg', 'sach.tensach')
                ->get();
        }
    } else {
        // Nếu không nhập từ khóa, lấy toàn bộ dữ liệu có join
        $ds_muontra = MuonTra::join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
            ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'muontra.id_dg')
            ->select('muontra.*', 'tkdocgia.ten_dg', 'sach.tensach')
            ->get();
    }

    return view('qlmt', compact('ds_muontra', 'tukhoa'));
}


// xuất dữ liệu
public function export(Request $request)
{
    $tukhoa = $request->input('tukhoa');

    $query = MuonTra::join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
        ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'muontra.id_dg')
        ->select('muontra.*', 'tkdocgia.ten_dg', 'sach.tensach');

    if ($tukhoa) {
        if (is_numeric($tukhoa) && $tukhoa >= 1 && $tukhoa <= 12) {
            $query->whereMonth('muontra.ngaymuon', (int)$tukhoa);
        } else {
            $query->where(function ($q) use ($tukhoa) {
                $q->where('tkdocgia.ten_dg', 'like', "%{$tukhoa}%")
                  ->orWhere('sach.tensach', 'like', "%{$tukhoa}%");
            });
        }
    }

    $data = $query->get();

    return Excel::download(new MuonTraExport($data), 'danh_sach_muon_tra.xlsx');
}






    /**
     * Hiển thị form chỉnh sửa bản ghi
     */
    public function edit($id_mt)
    {
        $muontra = MuonTra::findOrFail($id_mt);
        $ds_muontra = MuonTra::all(); // nếu muốn danh sách song song
          $ds_dg = DocGia::all();
          $ds_s = Sach::all();
        
        return view('qlmt', compact('muontra', 'ds_muontra','ds_dg','ds_s'));
    }

    /**
     * Cập nhật bản ghi sau khi chỉnh sửa
     */
    public function update(Request $request, $id_mt)
    {
        $request->validate([
            'id_dg'    => 'required|integer',
            'id_sach'  => 'required|integer',
            'ngaymuon' => 'required|date',
            'ngaytra'  => 'required|date',
            'ghichu'   => 'required|string|max:255',
        ]);

        $muontra = MuonTra::findOrFail($id_mt);
        $muontra->update($request->all());
         

        return redirect()->route('muontra.index');
                 
    }

    /**
     * Xóa một bản ghi mượn-trả
     */
    public function destroy($id_mt)
    {
        $muontra = MuonTra::findOrFail($id_mt);
        $muontra->delete();

        return redirect()->route('muontra.index');
                         
    }



    //thống kê sách
public function thongKeSach()
{
    $data = MuonTra::select('id_sach', DB::raw('count(*) as damuon'))
        ->groupBy('id_sach')
        ->with('sach')
        ->get();

    $tensach = [];
    $soluong = [];
    $damuon = [];
    $conlai = [];

    foreach ($data as $item) {
        $tensach[] = $item->sach->tensach ?? 'Không xác định';
        $soLuongGoc = $item->sach->soluong ?? 0;
        $soDaMuon = $item->damuon;
        $soConLai = $soLuongGoc - $soDaMuon;

        $soluong[] = $soLuongGoc;
        $damuon[] = $soDaMuon;
        $conlai[] = max($soConLai, 0);
    }

    return view('tksachmuon', [
        'tensach' => json_encode($tensach),
        'soluong' => json_encode($soluong),
        'damuon' => json_encode($damuon),
        'conlai' => json_encode($conlai),
        'data' => $data,
    ]);
}
public function exportThongKeSach()
{
    $data = MuonTra::select('id_sach', DB::raw('count(*) as damuon'))
        ->groupBy('id_sach')
        ->with('sach')
        ->get();

    return Excel::download(new ThongKeSachExport($data), 'thong_ke_sach.xlsx');
}



// thống kê hạn ngày 
public function thongKeHanNgay()
{
    // Ngày hiện tại
    $now = Carbon::now()->toDateString();

    // Truy vấn dữ liệu
    $data = DB::table('muontra')
        ->join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
        ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'muontra.id_dg')
        ->select(
            'sach.tensach',
            'tkdocgia.ten_dg',
            DB::raw("DATEDIFF('$now', muontra.ngaymuon) as songaymuon")
        )
        ->where('muontra.ghichu', 'LIKE', '%MƯỢN%')
        ->having('songaymuon', '>', 5)
        ->get();

    // Chuẩn bị dữ liệu
    $tensach = [];
    $ten_dg = [];
    $songaymuon = [];

    foreach ($data as $item) {
        $tensach[] = $item->tensach;
        $ten_dg[] = $item->ten_dg;
        $songaymuon[] = $item->songaymuon;
    }

    return view('tkthoihan', [
        'tensach' => json_encode($tensach),
        'ten_dg' => json_encode($ten_dg),
        'songaymuon' => json_encode($songaymuon),
        'data' => $data,
    ]);
}
public function exportThongKeHanNgay()
{
    $now = Carbon::now()->toDateString();

    $data = DB::table('muontra')
        ->join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
        ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'muontra.id_dg')
        ->select(
            'sach.tensach',
            'tkdocgia.ten_dg',
            DB::raw("DATEDIFF('$now', muontra.ngaymuon) as songaymuon")
        )
        ->where('muontra.ghichu', 'LIKE', '%MƯỢN%')
        ->having('songaymuon', '>', 5)
        ->get();

    return Excel::download(new ThongKeHanNgayExport($data), 'thong_ke_quahan.xlsx');
}


//thống kê theo tháng
public function thongketheothang()
{
    // Truy vấn dữ liệu: đếm số lượt mượn theo tháng và tên sách
    $data = DB::table('muontra')
        ->join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
        ->select(
            'sach.tensach',
            DB::raw('MONTH(muontra.ngaymuon) as thang'),
            DB::raw('COUNT(*) as soluot')
        )
        ->groupBy(DB::raw('MONTH(muontra.ngaymuon)'), 'sach.tensach')
        ->orderBy('thang')
        ->get();

    // Chuẩn bị dữ liệu cho view
    $tensach = [];
    $thang = [];
    $soluot = [];

    foreach ($data as $item) {
        $tensach[] = $item->tensach;
        $thang[] = 'Tháng ' . $item->thang;
        $soluot[] = $item->soluot;
    }

    return view('tkthang', [
        'tensach' => json_encode($tensach),
        'thang' => json_encode($thang),
        'soluot' => json_encode($soluot),
        'data' => $data
    ]);
}

public function exportThongKeTheoThang()
{
    $data = DB::table('muontra')
        ->join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
        ->select(
            'sach.tensach',
            DB::raw('MONTH(muontra.ngaymuon) as thang'),
            DB::raw('COUNT(*) as soluot')
        )
        ->groupBy(DB::raw('MONTH(muontra.ngaymuon)'), 'sach.tensach')
        ->orderBy('thang')
        ->get();

    return Excel::download(new ThongKeTheoThangExport($data), 'thong_ke_theo_thang.xlsx');
}
}