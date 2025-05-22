<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DocGia; // Import model TacGia

class DangNhapController extends Controller
{
    public function showForm()
    {
        return view('dangnhap');
    }

    public function xulyDangNhap(Request $request)
    {
        $username = $request->input('tdn');
        $password = $request->input('mkdn');

        $user = DocGia::where('ten_dg', $username)
                      ->where('mk_dg', $password)
                      ->first();

        if ($user) {
            session(['id_dg' => $user->id_dg]);
            return redirect()->route('trangchu');
        } else {
            return redirect()->back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu!');
        }
    }
}
