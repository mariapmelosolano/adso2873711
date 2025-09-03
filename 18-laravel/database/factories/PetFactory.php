<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pets = [
            'Max', 'Bella', 'Charlie', 'Luna', 'Lucy', 'Cooper', 'Daisy', 'Buddy', 'Molly', 'Rocky',
            'Bear', 'Sadie', 'Duke', 'Zoe', 'Toby', 'Chloe', 'Oliver', 'Lily', 'Jack', 'Sophie',
            'Teddy', 'Stella', 'Winston', 'Penny', 'Spider', 'Roxy', 'Leo', 'Ruby', 'Milo', 'Gracie',
            'Zeus', 'Mia', 'Louie', 'Lola', 'Jax', 'Coco', 'Bentley', 'Rosie', 'Murphy', 'Ellie',
            'Finn', 'Abby', 'Henry', 'Piper', 'Otis', 'Ginger', 'Tucker', 'Lulu', 'Gus', 'Nala',
            'Sam', 'Willow', 'Koda', 'Maddie', 'Apollo', 'Layla', 'Harley', 'Zara', 'Bruno', 'Pepper',
            'Beau', 'Lilly', 'Dexter', 'Sasha', 'Ace', 'Lexi', 'Scout', 'Maya', 'Jake', 'Izzy',
            'Bandit', 'Annie', 'Thor', 'Olive', 'Riley', 'Cookie', 'Marley', 'Hazel', 'Gunner', 'Emma',
            'Bo', 'Riley', 'Cash', 'Phoebe', 'Simba', 'Harper', 'Oreo', 'Belle', 'Rex', 'Dixie',
            'Hank', 'Holly', 'Moose', 'Sugar', 'Prince', 'Ivy', 'Chico', 'Maggie', 'Benny', 'Ella',
            'Bruce', 'Mocha', 'Rocco', 'Winnie', 'Rudy', 'Kona', 'Sammy', 'Athena', 'Tank', 'Cleo'
        ];

        $petName = $pets[array_rand($pets)];
        $kind = fake()->randomElement(['Dog', 'Cat', 'Bird', 'Pig', 'Rabbit']);
        
        // ID único para la mascota
        $id = fake()->unique()->numerify('88######');
        
      
        $imageUrl = "https://placekeanu.com/300/300"; 
        
        // Crear directorio si no existe
        if (!file_exists(public_path('images/pets'))) {
            mkdir(public_path('images/pets'), 0777, true);
        }
        
        // Descargar imagen
        $imageFilename = $id . '.png';
        $imagePath = public_path('images/pets/' . $imageFilename);
        
        try {
            copy($imageUrl, $imagePath);
        } catch (\Exception $e) {
            // Si falla la descarga, usar imagen por defecto
            $imageFilename = 'no-image.webp';
        }

        return [
            'name'        => $petName . fake()->numerify('-##'),
            'photo'       => $imageFilename,
            'kind'        => $kind,
            'weight'      => fake()->numberBetween(1, 80),
            'age'         => fake()->numberBetween(1, 18),
            'breed'       => fake()->colorName(),
            'location'    => fake()->city(),
            'description' => fake()->sentence(10),
            'active'      => fake()->boolean(90),
            'status'      => fake()->boolean(20),
            'created_at'  => now()
        ];
    }
}