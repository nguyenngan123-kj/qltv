<?php

namespace App\Exports;

use App\Models\MuonTra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeSachExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Lấy dữ liệu từ bảng muontra
        $data = MuonTra::select('id_sach', DB::raw('count(*) as damuon'))
            ->groupBy('id_sach')
            ->with('sach')
            ->get();

        // Chuyển đổi thành collection phù hợp để export
        return collect($data->map(function ($item) {
            $sach = $item->sach;
            $tensach = $sach->tensach ?? 'Không xác định';
            $soluong = $sach->soluong ?? 0;
            $damuon = $item->damuon;
            $conlai = max($soluong - $damuon, 0);

            return [
                'Tên sách' => $tensach,
                'Số lượng' => $soluong,
                'Đã mượn' => $damuon,
                'Còn lại' => $conlai,
            ];
        }));
    }

    public function headings(): array
    {
        return ['Tên sách', 'Số lượng', 'Đã mượn', 'Còn lại'];
    }
}
