<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SachExport implements FromCollection, WithHeadings
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
              
                $item->masach,     // lấy tên độc giả
                $item->tensach,    // lấy tên sách
                $item->tentg,
                $item->tentl,
                $item->nxb,
                $item->ngaynhap,
                $item->soluong,
                $item->hinhsach,
                $item->link,
            ];
        }));
    }

    public function headings(): array
    {
        return ['Mã sách','Tên sách', 'Tác giả', 'Thể loại', 'NXB','Ngày nhập', 'Số lượng','hinhsach','link'];
    }
}