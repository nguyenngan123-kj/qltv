<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\TacGia;

class TimKiemController extends Controller
{

    public function timKiem(Request $request)
    {
        $tukhoa = $request->input('tukhoa');

        if ($tukhoa) {
            // Tìm sách có chứa từ khóa trong tên sách hoặc tên tác giả
         $sachs = Sach::join('tacgia', 'sach.id_tg', '=', 'tacgia.id_tg')
                ->select('sach.id_sach', 'sach.tensach', 'sach.hinhsach', 'tacgia.tentg')
                ->where(function($query) use ($tukhoa) {
                    $query->where('sach.tensach', 'like', "%$tukhoa%")
                        ->orWhere('tacgia.tentg', 'like', "%$tukhoa%");
                })
                ->get();


            return view('timkiem', compact('sachs', 'tukhoa'));
        }

        return redirect()->back()->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
    }
}

