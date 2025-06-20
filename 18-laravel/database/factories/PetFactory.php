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
    public function definition(): array{
    // Array de 200 nombres de mascotas, una sola palabra y capitalizados
$pets = [
    'Max', 'Bella', 'Charlie', 'Luna', 'Rocky', 'Lucy', 'Buddy', 'Daisy', 'Milo', 'Lola',
    'Jack', 'Sadie', 'Toby', 'Molly', 'Bailey', 'Coco', 'Bear', 'Maggie', 'Duke', 'Sophie',
    'Oliver', 'Chloe', 'Jake', 'Stella', 'Teddy', 'Zoe', 'Leo', 'Penny', 'Bentley', 'Ruby',
    'Zeus', 'Rosie', 'Oscar', 'Ellie', 'Riley', 'Nala', 'Buster', 'Mia', 'Murphy', 'Lily',
    'Sam', 'Gracie', 'Finn', 'Abby', 'Gus', 'Hazel', 'Henry', 'Pepper', 'Sammy', 'Willow',
    'Shadow', 'Harley', 'Dexter', 'Cleo', 'Scout', 'Belle', 'Lucky', 'Jasper', 'Minnie', 'Simba',
    'Olive', 'Moose', 'Roxy', 'Louie', 'Millie', 'Boomer', 'Izzy', 'Winston', 'Annie', 'Tank',
    'Layla', 'Blue', 'Piper', 'Thor', 'Harper', 'Ace', 'Remi', 'Rusty', 'Nova', 'Apollo',
    'Ginger', 'Marley', 'Athena', 'Ollie', 'Sasha', 'Bruno', 'Maddie', 'Diesel', 'Cali', 'King',
    'Phoebe', 'Chester', 'Lexi', 'Benny', 'Princess', 'Ranger', 'Maya', 'Copper', 'Cookie', 'Mocha',
    'Misty', 'Rocco', 'Sandy', 'Frankie', 'Chance', 'Trixie', 'Hunter', 'Angel', 'Porter', 'Sally',
    'Baxter', 'Sugar', 'Cash', 'Pumpkin', 'Rufus', 'Dixie', 'Hank', 'Peanut', 'Bruce', 'Josie',
    'Chico', 'Bonnie', 'Oreo', 'Maverick', 'Peaches', 'Bambi', 'Archie', 'Tasha', 'Rudy', 'Fiona',
    'Mojo', 'Tessa', 'Prince', 'Mochi', 'Dallas', 'Mittens', 'Cody', 'Sparky', 'Rex', 'Boo',
    'Bubbles', 'Sunny', 'Jet', 'Storm', 'Tiger', 'Paws', 'Shadow', 'Fluffy', 'Smokey', 'Gizmo',
    'Poppy', 'Maple', 'Cinnamon', 'Socks', 'Mochi', 'Pickles', 'Pumpkin', 'Snickers', 'Tango', 'Mango',
    'Clover', 'Basil', 'Olaf', 'Sable', 'Indy', 'Echo', 'Pixel', 'Cosmo', 'Blaze', 'Fudge',
    'Biscuit', 'Cuddles', 'Dobby', 'Fuzzy', 'Hershey', 'Juno', 'Koda', 'Loki', 'Mochi', 'Nala',
    'Otis', 'Panda', 'Quincy', 'Rascal', 'Sage', 'Teddy', 'Uno', 'Vega', 'Waffles', 'Yoshi',
    'Ziggy', 'Amber', 'Bingo', 'Cleo', 'Dino', 'Ember', 'Fawn', 'Goose', 'Hopper', 'Ivy',
    'Jelly', 'Kiki', 'Lemon', 'Miso', 'Nugget', 'Onyx', 'Pesto', 'Quinn', 'Rolo', 'Sushi',
    'Sable', 'Raven', 'Ash', 'Comet', 'Doodle', 'Frosty', 'Marshmallow', 'Sprout', 'Bingo', 'Nemo',
];
    {
        return [
            'name'        => $pets[array_rand($pets)] . fake()->numerify('##'),
            'kind'        => fake()->randomElement(['Dog','Cat','Bird','Mouse','Dog','Cat','Dog']),
            'weight'      => fake()->numberBetween(1, 20),
            'age'         => fake()->numberBetween(1, 12),
            'breed'       => fake()->colorName(),
            'location'    => fake()->city(),
            'description' => fake()->sentence(),
            'created_at'  => now(),
        ];
    }
  }
}
