<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Action;

class ActionsTableSeeder extends Seeder
{
    /**
     * Créer 5 ventes d'actions
     */
    public function run(): void
    {
        Action::factory()->count(5)->create();
    }
}
