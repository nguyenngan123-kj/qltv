<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeHanNgayExport implements FromCollection, WithHeadings
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
                'Tên Sách' => $item->tensach,
                'Tên Độc Giả' => $item->ten_dg,
                'Số Ngày Mượn' => $item->songaymuon,
            ];
        }));
    }

    public function headings(): array
    {
        return ['Tên Sách', 'Tên Độc Giả', 'Số Ngày Mượn'];
    }
}
