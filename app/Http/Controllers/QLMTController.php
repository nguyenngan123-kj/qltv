<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuonTra;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class QLMTController extends Controller
{
    /**
     * Hiển thị danh sách mượn-trả
     */
  
        public function index(Request $request)
        {
            $tukhoa = $request->input('tukhoa');

            if ($tukhoa) {
                $ds_muontra = MuonTra::where('id_dg', 'like', "%$tukhoa%")
                    ->orWhere('id_sach', 'like', "%$tukhoa%")
                    ->get();
            } else {
                $ds_muontra = MuonTra::all();
            }

            return view('qlmt', compact('ds_muontra', 'tukhoa'));
        }


    /**
     * Hiển thị form chỉnh sửa bản ghi
     */
    public function edit($id_mt)
    {
        $muontra = MuonTra::findOrFail($id_mt);
        $ds_muontra = MuonTra::all(); // nếu muốn danh sách song song
        return view('qlmt', compact('muontra', 'ds_muontra'));
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

    return view('sosachbd', [
        'tensach' => json_encode($tensach),
        'soluong' => json_encode($soluong),
        'damuon' => json_encode($damuon),
        'conlai' => json_encode($conlai),
        'data' => $data,
    ]);
}

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

    return view('sdgbd', [
        'tensach' => json_encode($tensach),
        'ten_dg' => json_encode($ten_dg),
        'songaymuon' => json_encode($songaymuon),
        'data' => $data,
    ]);
}

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

    return view('stkthang', [
        'tensach' => json_encode($tensach),
        'thang' => json_encode($thang),
        'soluot' => json_encode($soluot),
        'data' => $data
    ]);
}

}