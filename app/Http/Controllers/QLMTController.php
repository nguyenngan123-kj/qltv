<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuonTra;

class QLMTController extends Controller
{
    /**
     * Hiển thị danh sách mượn-trả
     */
    public function index()
    {
        $ds_muontra = MuonTra::all();
        return view('qlmt', compact('ds_muontra'));
    }

    /**
     * Hiển thị form chỉnh sửa bản ghi
     */
    public function edit($id_mt)
    {
        $muontra = MuonTra::findOrFail($id_mt);
        $ds_muontra = MuonTra::all(); // nếu muốn danh sách song song
        return view('qlmt', compact('muontra', 'ds_muontra'));
    }

    /**
     * Cập nhật bản ghi sau khi chỉnh sửa
     */
    public function update(Request $request, $id_mt)
    {
        $request->validate([
            'id_dg'    => 'required|integer',
            'id_sach'  => 'required|integer',
            'ngaymuon' => 'required|date',
            'ngaytra'  => 'required|date',
            'ghichu'   => 'required|string|max:255',
        ]);

        $muontra = MuonTra::findOrFail($id_mt);
        $muontra->update($request->all());
         

        return redirect()->route('muontra.index');
                 
    }

    /**
     * Xóa một bản ghi mượn-trả
     */
    public function destroy($id_mt)
    {
        $muontra = MuonTra::findOrFail($id_mt);
        $muontra->delete();

        return redirect()->route('muontra.index');
                         
    }
}
