<?php

namespace App\Exports;

use App\Models\Asesi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AsesiExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Asesi::select('no_peserta', 'nama', 'kelas', 'tahun_aktif', 'nama_pengguna')->get();
    }

    public function headings(): array
    {
        return [
            'No Peserta',
            'Nama',
            'Kelas',
            'Tahun Aktif',
            'Nama Pengguna',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '366092']],
            ],
        ];
    }
}
