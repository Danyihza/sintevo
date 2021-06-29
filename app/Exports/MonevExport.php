<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonevExport implements FromArray, WithHeadings, ShouldAutoSize
{

    protected $data;
    protected $isFinansial;

    public function __construct(array $data, bool $isFinansial = false)
    {
        $this->data = $data;
        $this->isFinansial = $isFinansial;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        if ($this->isFinansial) {
            return [
                'Tanggal Transaksi', 'Jenis Transaksi', 'Keterangan Transaksi', 'Jumlah', 'Tanggal Input'
            ];
        }
        return [
            'Tanggal', 'Status', 'Uraian', 'File', 'Feedback', 'Tanggal Input'
        ];
    }
}
