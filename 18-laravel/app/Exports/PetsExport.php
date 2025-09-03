<?php

namespace App\Exports;

use App\Models\Pet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PetsExport implements FromView, WithColumnWidths, WithStyles
{
    public function view(): View
    {
        return view('pets.excel', [
            'pets' => Pet::all()
        ]);
    }
    
    public function columnWidths(): array
    {
        return [
            'A' =>  5,
            'B' => 20,
            'C' => 15,
            'D' => 10,
            'E' => 10,
            'F' => 15,
            'G' => 20,
            'H' => 30,
            'I' => 10,
            'J' => 15
        ];
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true, 'size' => 16]],
        ];
    }
}