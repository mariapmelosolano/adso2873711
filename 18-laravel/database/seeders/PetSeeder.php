<?php

namespace Database\Seeders;
use App\Models\Pet;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pet = new Pet;
        $pet->name     = 'Stuart';
        $pet->kind     = 'Dog';
        $pet->weight   = 2.5;
        $pet->age      = 8;
        $pet->breed    = 'Pincher';
        $pet->location = 'Manizales, Colombia';
        $pet->description = 'Its a good boy';
        $pet->save();

        $pet = new Pet;
        $pet->name     = 'Killer';
        $pet->kind     = 'Dog';
        $pet->weight   = 8.5;
        $pet->age      = 3;
        $pet->breed    = 'Germany Shepherd';
        $pet->location = 'Berlin, Germany';
        $pet->description = 'Its a good boy';
        $pet->save();

        $pet = new Pet;
        $pet->name     = 'Michi';
        $pet->kind     = 'Cat';
        $pet->weight   = 1.5;
        $pet->age      = 7;
        $pet->breed    = 'Persa';
        $pet->location = 'Abu, Dhuabi';
        $pet->description = 'Only chickend food.';
        $pet->save();

        $pet = new Pet;
        $pet->name     = 'Chanchi';
        $pet->kind     = 'Pig';
        $pet->weight   = 15.8;
        $pet->age      = 5;
        $pet->breed    = 'Mini';
        $pet->location = 'Tokio, Japan';
        $pet->description = 'All Kind of food.';
        $pet->save();
    }
}
