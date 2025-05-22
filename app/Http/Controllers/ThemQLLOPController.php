<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
class ThemQLLOPController extends Controller
{
    //
       public function store(Request $request)
    {
        $request->validate([
            
            'malop' => 'required',
            'tenlop' => 'required',
            'khoa' => 'required',
            'nienkhoa' => 'required',
            'gvcn' => 'required',
        ]);

        Lop::create($request->all());
        return redirect()->route('lop.index');
    }
      public function themqllop(Request $request)
    {
      return view('themqllop');
    }

}
