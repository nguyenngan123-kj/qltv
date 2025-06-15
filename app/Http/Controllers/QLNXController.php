<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanXet;
use App\Models\Sach;
use App\Models\DocGia;
class QLNXController extends Controller
{

      public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');

        if ($tukhoa) {
             $ds_nhanxet = NhanXet::join('sach', 'sach.id_sach', '=', 'nhanxet.id_sach')
            ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'nhanxet.id_dg')
                ->where('tkdocgia.ten_dg', 'like', "%$tukhoa%")
                ->orWhere('sach.tensach', 'like', "%$tukhoa%")
                 ->select('nhanxet.*', 'tkdocgia.ten_dg', 'sach.tensach')
                ->get();
        } else {
            $ds_nhanxet = NhanXet::join('sach', 'sach.id_sach', '=', 'nhanxet.id_sach')
            ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'nhanxet.id_dg')
            ->select('nhanxet.*', 'tkdocgia.ten_dg', 'sach.tensach')
            ->get();
        }

        return view('qlnx', compact('ds_nhanxet', 'tukhoa'));
    }

    public function edit($id_nx)
    {
        $nhanxet = NhanXet::findOrFail($id_nx);
        $ds_nhanxet = NhanXet::all(); // nếu cần hiển thị danh sách luôn
        $ds_dg = DocGia::all();
          $ds_s = Sach::all();
        return view('qlnx', compact('nhanxet', 'ds_nhanxet','ds_dg','ds_s'));
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
