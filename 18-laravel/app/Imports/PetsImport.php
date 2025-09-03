<?php

namespace App\Imports;

use App\Models\Pet;
use Maatwebsite\Excel\Concerns\ToModel;

class PetsImport implements ToModel
{
    public function model(array $row)
    {
        return new Pet([
            'name' => $row[0],
            'kind' => $row[1],
            'weight' => $row[2],
            'age' => $row[3],
            'breed' => $row[4],
            'location' => $row[5],
            'description' => $row[6],
            'active' => $row[7] ?? 1,
            'status' => $row[8] ?? 'available'
        ]);
    }
}