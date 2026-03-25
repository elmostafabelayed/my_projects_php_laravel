<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
                return [
           'titre' => $this->faker->words(3, true), // génère un titre avec 3 mots
            'description' => $this->faker->paragraphs(2, true), // génère un texte avec 2 paragraphes
            'type' => $this->faker->randomElement(['Appartement', 'Maison', 'Villa', 'Magasin', 'Terrain']),
            'ville' => $this->faker->city,
            'superficie' => $this->faker->numberBetween(50, 500), // génère un nombre entre 50 et 500
            'neuf' => $this->faker->boolean,
            'prix' => $this->faker->randomFloat(2, 10000, 1000000), // génère un prix entre 10,000 and 1,000,000 avec deux chiffres après virgule
            // 'photo' => $this->faker->imageUrl(640, 480, 'annonce', true), // génère un URL pour une fausse image avec un texte basé sur le mot 'annonce'
            // 'user_id' => \App\Models\User::factory(), // génère et associe un utilisateur à l'annonce
            'created_at' => now(),
            'updated_at' => now(),
        ];

    }
}
