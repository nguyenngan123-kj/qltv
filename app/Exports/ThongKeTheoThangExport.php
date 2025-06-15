<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeTheoThangExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data->map(function ($item) {
            return [
                $item->tensach,
                'Tháng ' . $item->thang,
                $item->soluot,
            ];
        }));
    }

    public function headings(): array
    {
        return ['Tên Sách', 'Tháng', 'Số Lượt Mượn'];
    }
}
