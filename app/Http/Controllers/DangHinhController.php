<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DangHinh; // Import model DangHinh
class DangHinhController extends Controller
{
 
  public function index(Request $request)
{
    $ds = DangHinh::all();
    return view('dh', compact('ds'));
}

public function edit($id_dh)
{
    $danghinh = DangHinh::findOrFail($id_dh);
    $ds = DangHinh::all(); // nếu cần hiển thị danh sách luôn
    return view('dh', compact('danghinh', 'ds'));
}


    public function update(Request $request, $id_dh)
    {
        $request->validate([
            'tieude' => 'required',
            'hinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

         $danghinh = DangHinh::findOrFail($id_dh);
         $data = $request->only(['tieude']);
          if ($request->hasFile('hinh')) {
        $file = $request->file('hinh');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('hinhanh'), $filename);
        $data['hinh'] = 'hinhanh/' . $filename;
    }
        $danghinh->update($data);
        return redirect()->route('dh.index')->with('success', 'Cập nhật thành công!');
    }
    
   
    public function destroy($id_dh)
    {
         $danghinh = DangHinh::findOrFail($id_dh);
        $danghinh->delete();
        return redirect()->route('dh.index');
    }
    
}
