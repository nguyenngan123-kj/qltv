<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
  public function showLoginForm()
    {
        return view('admin'); // Trang đăng nhập admin.blade.php
    }

    public function login(Request $request)
    {
       

        $username = $request->input('tdn');
        $password = $request->input('mkdn');

        // Truy vấn CSDL
      $admin = Admin::where('ten_ad', $username)
              ->where('mk_ad', $password)
              ->first();

            if($admin){
                 return redirect()->route('quanly');
             
                }
}
}