<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;

class LGiaotrinhController extends Controller
{
    public function show()
    {
        $sachs = Sach::join('tacgia', 'sach.id_tg', '=', 'tacgia.id_tg')
                    ->join('theloai', 'sach.id_tl', '=', 'theloai.id_tl')
                    ->select('sach.*', 'tacgia.tentg', 'theloai.tentl')
                    ->where('theloai.tentl', 'GIÁO TRÌNH')
                    ->get();

        return view('lgiaotrinh', [
            'sachs' => $sachs, // sửa từ 'sach' thành 'sachs'
        ]);
    }
}
