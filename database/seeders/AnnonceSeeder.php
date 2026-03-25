<?php

namespace Database\Seeders;

use App\Models\Annonce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Annonce::create([
            "titre"=>"Joli Appart",
            "description"=>"2 chambre 1 salon et 1 cuisine",
            "ville"=>"Fès",
            "superficie"=>100,
            "neuf"=>true,
            "prix"=>600000,
        ]);
    }
}
