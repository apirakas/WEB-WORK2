<?php

namespace Database\Factories;

use App\Models\Action;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActionFactory extends Factory
{
    protected $model = Action::class;

    public function definition()
    {
        return [
            'nom_action' => $this->faker->word,
            'devise' => $this->faker->currencyCode,
            'prix_unitaire_achat' => $this->faker->randomFloat(2, 1, 100),
            'prix_unitaire_vente' => $this->faker->randomFloat(2, 1, 100),
            'frais' => $this->faker->randomFloat(2, 1, 10),
            'quantite' => $this->faker->numberBetween(1, 100),
            'date_vente' => $this->faker->date('Y-m-d'),
        ];
    }
}
