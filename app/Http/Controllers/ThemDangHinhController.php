<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DangHinh; // Import model DangHinh
class ThemDangHinhController extends Controller
{
      public function store(Request $request)
    {
        $request->validate([
            
            'tieude' => 'required',
            'hinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);
        
     $data = $request->all();
 if ($request->hasFile('hinh')) {
        $file = $request->file('hinh');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('hinhanh'), $filename);
        $data['hinh'] = 'hinhanh/' . $filename;

  DangHinh::create($data);
    return redirect()->route('dh.index')->with('success', 'Thêm sách thành công!');
   }
  }
      public function themhinh(Request $request)
    {
      return view('themdh');
    }
}
