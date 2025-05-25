<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;

class QLLOPController extends Controller
{
 public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');
        
        if ($tukhoa) {
            $ds_lop = Lop::where('tenlop', 'like', "%$tukhoa%")->get();
        } else {
            $ds_lop = Lop::all();
        }

        return view('qllop', compact('ds_lop', 'tukhoa'));
    }
  
public function edit($id_lop)
{
    $lop = Lop::findOrFail($id_lop);
    $ds_lop = Lop::all(); // nếu cần hiển thị danh sách luôn
    return view('qllop', compact('lop', 'ds_lop'));
}


    public function update(Request $request, $id_lop)
    {
        $request->validate([
            'malop' => 'required',
            'tenlop' => 'required',
            'khoa' => 'required',
            'nienkhoa' => 'required',
            'gvcn' => 'required',
        ]);

        $lop = Lop::findOrFail($id_lop);
        $lop->update($request->all());
        return redirect()->route('lop.index');
    }

    public function destroy($id_lop)
    {
        $lop = Lop::findOrFail($id_lop);
        $lop->delete();
        return redirect()->route('lop.index');
    }
   
}
