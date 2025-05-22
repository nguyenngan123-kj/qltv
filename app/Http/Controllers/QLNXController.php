<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanXet;

class QLNXController extends Controller
{
    public function index()
    {
        $ds_nhanxet = NhanXet::all();
        return view('qlnx', compact('ds_nhanxet'));
    }

    public function edit($id_nx)
    {
        $nhanxet = NhanXet::findOrFail($id_nx);
        $ds_nhanxet = NhanXet::all(); // nếu cần hiển thị danh sách luôn
        return view('qlnx', compact('nhanxet', 'ds_nhanxet'));
    }

    public function update(Request $request, $id_nx)
    {
        $request->validate([
            'id_dg' => 'required|integer',
            'id_sach' => 'required|integer',
            'nhanxt' => 'required|string',
        ]);

        $nhanxet = NhanXet::findOrFail($id_nx);
        $nhanxet->update($request->all());
        return redirect()->route('nhanxet.index');
    }

    public function destroy($id_nx)
    {
        $nhanxet = NhanXet::findOrFail($id_nx);
        $nhanxet->delete();
        return redirect()->route('nhanxet.index');
    }
}
