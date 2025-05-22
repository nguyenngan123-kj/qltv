<?php

namespace App\Http\Controllers;

use App\Models\Sach; // Import model Sach
use App\Models\MuonTra; // Import model MuonTra
use App\Models\TruyCapWeb; // Import model TruyCapWeb
use App\Models\TinTuc; // Import model TinTuc
use App\Models\TacGia; // Import model TacGia
use Illuminate\Http\Request;
  

class TrangChuController extends Controller
{
   
        public function index(Request $request)
        {
            // Thống kê số lượng sách
        $tong_sach = Sach::sum('soluong');
        $sach_muon = MuonTra::where('ghichu', 'MƯỢN')->count();
        $sach_con_lai = $tong_sach - $sach_muon;

        // Lượt truy cập (cập nhật và lấy)
        TruyCapWeb::where('id_tcw', 1)->increment('soluot');
        $luot_truy_cap = TruyCapWeb::where('id_tcw', 1)->value('soluot');

        // Sách mới nhất (5 cuốn)
        $sach_moi = Sach::join('tacgia', 'sach.id_tg', '=', 'tacgia.id_tg')
                        ->select('sach.*', 'tacgia.tentg')
                        ->orderByDesc('id_sach')
                        ->limit(5)
                        ->get();

        // Tin tức mới nhất
        $tin_tuc = TinTuc::orderByDesc('id_tt')
                         ->limit(5)
                         ->get();

        // Sách đề xuất ngẫu nhiên
        $de_xuat = Sach::join('tacgia', 'sach.id_tg', '=', 'tacgia.id_tg')
                        ->select('sach.*', 'tacgia.tentg')
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();

         // Lấy id_dg từ session Laravel
            $id_dg = session('id_dg'); // Trả về null nếu không có
                   
        return view('trangchu', compact(
            'tong_sach', 'sach_muon', 'sach_con_lai',
            'luot_truy_cap', 'sach_moi', 'tin_tuc', 'de_xuat','id_dg'
        ));
    }
  
    
    public function timkiem(Request $request)
    {
        $tukhoa = $request->input('tukhoa');
    
        // Tìm kiếm sách theo tên sách hoặc tác giả
        $sachs = Sach::where('tensach', 'like', "%$tukhoa%")->get();
        $tacgias = TacGia::where('tentg', 'like', "%$tukhoa%")->get();

        if ($tukhoa) {
         return view('timkiem', compact('sachs', 'tacgias', 'tukhoa'));
        }     
      
    }

}
