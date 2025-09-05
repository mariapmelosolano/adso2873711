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
            'Max', 'Luna', 'Bella', 'Charlie', 'Lucy', 'Cooper', 'Daisy', 'Milo', 'Sadie', 'Rocky',
            'Lola', 'Bear', 'Zoe', 'Duke', 'Stella', 'Tucker', 'Molly', 'Teddy', 'Chloe', 'Winston',
            'Penny', 'Oliver', 'Roxy', 'Zeus', 'Ruby', 'Bentley', 'Lily', 'Murphy', 'Sophie', 'Jax',
            'Gracie', 'Oscar', 'Rosie', 'Leo', 'Ellie', 'Moose', 'Abby', 'Louie', 'Piper', 'Gus',
            'Maggie', 'Finn', 'Ginger', 'Riley', 'Zara', 'Tank', 'Coco', 'Apollo', 'Sasha', 'Thor',
            'Annie', 'Sam', 'Lilly', 'Bandit', 'Princess', 'Diesel', 'Emma', 'Marley', 'Willow', 'Gunner',
            'Izzy', 'Shadow', 'Nala', 'Scout', 'Holly', 'Kobe', 'Lexi', 'Brody', 'Lulu', 'Hank',
            'Mia', 'Jackson', 'Pepper', 'Axel', 'Harley', 'Bruno', 'Ziggy', 'Rex', 'Pearl', 'Jake',
            'Cody', 'Sandy', 'Ranger', 'Layla', 'Champ', 'Maddie', 'Hunter', 'Maya', 'Rusty', 'Shelby',
            'Simba', 'Athena', 'Dexter', 'Millie', 'Rocco', 'Mocha', 'Otis', 'Kona', 'Boomer', 'Fiona'
        ];

        return [
            'name'        => $pets[array_rand($pets)] . fake()->numerify('###'),
            'kind'        => fake()->randomElement(['Dog', 'Cat', 'Dog', 'Bird', 'Mouse', 'Dog', 'Hamster', 'Pig']),
            'weight'      => fake()->numberBetween(1, 80),    // Es un rango entre
            'age'         => fake()->randomNumber(1, true),
            'breed'       => fake()->colorName(),
            'location'    => fake()->city(),
            'description' => fake()->sentence(10),
            'created_at'   => now()
        ];
        /*
        'name',
        'photo',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'active',
        'status'
        */
    }
}
