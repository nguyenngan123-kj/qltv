<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use App\Models\NhanXet;
use App\Models\YeuThich;
use App\Models\LichSu; 

class ChiTietSachController extends Controller
{
    public function show($id_sach)
    {
        $sach = Sach::join('tacgia', 'sach.id_tg', '=', 'tacgia.id_tg')
                    ->join('theloai', 'sach.id_tl', '=', 'theloai.id_tl')
                    ->select('sach.*', 'tacgia.tentg', 'theloai.tentl')
                    ->where('sach.id_sach', $id_sach)
                    ->firstOrFail();

        $sachCungTheLoai = Sach::where('id_tl', $sach->id_tl)
                                ->where('id_sach', '!=', $id_sach)
                                ->take(5)
                                ->get();

 $nhanxets = NhanXet::join('tkdocgia', 'nhanxet.id_dg', '=', 'tkdocgia.id_dg') // phải join với docgia
                   ->select('nhanxet.*', 'tkdocgia.ten_dg') // lấy tên độc giả
                   ->where('nhanxet.id_sach', $id_sach)
                   ->orderByDesc('nhanxet.id_nx') // dùng đúng tên khóa chính
                   ->limit(5)
                   ->get();


        return view('chitietsach', [
            'id_sach' => $id_sach,
            'sach' => $sach,
            'sachCungTheLoai' => $sachCungTheLoai,
            'nhanxets' => $nhanxets
        ]);
    }

    public function guiNhanXet(Request $request, $id_sach)
    {
        $request->validate([
            'nhanxet' => 'required|string|max:1000',
        ]);

        NhanXet::create([
            'id_sach' => $id_sach,
            'id_dg' => session('id_dg'), // Lấy ID độc giả từ session
            'nhanxt' => $request->input('nhanxet'),
        ]);

        return redirect()->route('chitietsach', ['id_sach' => $id_sach])->with('success', 'Đã gửi nhận xét!');
    }
    public function luuYeuThich(Request $request, $id_sach)
{
    $id_dg = session('id_dg');

    if ($id_dg && $id_sach) {
        // Kiểm tra đã tồn tại hay chưa (dùng Eloquent)
        $exists = YeuThich::where('id_dg', $id_dg)
                          ->where('id_sach', $id_sach)
                          ->exists();

        if (!$exists) {
            // Thêm mới bản ghi
            $inserted = YeuThich::create([
                'id_dg' => $id_dg,
                'id_sach' => $id_sach,
            ]);

            if ($inserted) {
                return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                                 ->with('success', '✔️ Đã thêm vào yêu thích!');
            } else {
                return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                                 ->with('error', '❌ Lỗi khi thêm vào yêu thích!');
            }
        } else {
            return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                             ->with('warning', '⚠️ Sách này đã có trong danh sách yêu thích.');
        }
    }

    return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                     ->with('error', '❌ Bạn chưa đăng nhập!');
}


public function luuLichSuDoc(Request $request, $id_sach)
{
    $id_dg = session('id_dg'); // Lấy ID độc giả từ session

    if ($id_dg && $id_sach) {
        // Kiểm tra đã tồn tại trong lịch sử đọc chưa (dùng Eloquent)
        $exists = LichSu::where('id_dg', $id_dg)
                        ->where('id_sach', $id_sach)
                        ->exists();

        if (!$exists) {
            // Thêm mới bản ghi vào lịch sử đọc
            $inserted = LichSu::create([
                'id_dg' => $id_dg,
                'id_sach' => $id_sach,
            ]);

            if ($inserted) {
                return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                                 ->with('success', '✔️ Đã thêm vào lịch sử đọc!');
            } else {
                return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                                 ->with('error', '❌ Lỗi khi thêm vào lịch sử đọc!');
            }
        } else {
            return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                             ->with('warning', '⚠️ Sách này đã có trong danh sách lịch sử đọc.');
        }
    }

    return redirect()->route('chitietsach', ['id_sach' => $id_sach])
                     ->with('error', '❌ Bạn chưa đăng nhập!');
}


}
