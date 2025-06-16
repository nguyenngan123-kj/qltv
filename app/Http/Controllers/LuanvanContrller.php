<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
class LuanvanContrller extends Controller
{
    public function show()
    {
        // Lấy danh sách sách thuộc thể loại "TIỂU THUYẾT"
        $sachs = Sach::join('tacgia', 'sach.id_tg', '=', 'tacgia.id_tg')
                    ->join('theloai', 'sach.id_tl', '=', 'theloai.id_tl')
                    ->select('sach.*', 'tacgia.tentg', 'theloai.tentl')
                    ->where('theloai.tentl', 'LUẬN VĂN')
                    ->get();

        return view('lluanvan', [ // view đổi tên cho đúng với nội dung
            'sachs' => $sachs,
        ]);
    }
}
