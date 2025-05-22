<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use Illuminate\Support\Facades\DB;

class SachTopController extends Controller
{
    public function show()
    {
        $topSachs = Sach::with('tacgia')
            ->withCount([
                'yeuthich as luotluu' => function ($query) {
                    $query->select(DB::raw('count(distinct id_dg)'));
                }
            ])
            ->orderByDesc('luotluu')
            ->get();

        return view('sachtop', compact('topSachs'));
    }
}
