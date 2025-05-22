<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YeuThich;
class YeuThichController extends Controller
{
     public function yeuthich()
    {

    $id_dg = session('id_dg');

    // Lấy lịch sử cùng thông tin sách và tên tác giả
    $yeuthich = YeuThich::with(['sach.tacgia'])
                ->where('id_dg', $id_dg)
                ->get();
                return view('yeuthich', compact('yeuthich'));
    }
}
