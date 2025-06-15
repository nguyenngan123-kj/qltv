<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MuonTraExport implements FromCollection, WithHeadings
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
                $item->id_mt,
                $item->ten_dg,     // lấy tên độc giả
                $item->tensach,    // lấy tên sách
                $item->ngaymuon,
                $item->ngaytra,
                $item->ghichu,
            ];
        }));
    }

    public function headings(): array
    {
        return ['ID', 'Tên Độc Giả', 'Tên Sách', 'Ngày Mượn', 'Ngày Trả', 'Ghi Chú'];
    }
}
