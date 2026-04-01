<?php

namespace App\Exports;

use App\Models\Asesor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AsesorExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Asesor::select('nama_lengkap', 'no_MET', 'akun', 'status')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'No MET',
            'Akun',
            'Status',
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
