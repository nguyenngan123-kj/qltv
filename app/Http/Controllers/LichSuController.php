<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LichSu;
class LichSuController extends Controller
{
    public function lichsu()
    {

    $id_dg = session('id_dg');

    // Lấy lịch sử cùng thông tin sách và tên tác giả
    $lichSu = LichSu::with(['sach.tacgia'])
                ->where('id_dg', $id_dg)
                ->get();
                return view('lichsu', compact('lichSu'));
    }
}



