<?php

namespace Database\Seeders;

use App\Models\Aprendiz;
use Illuminate\Database\Seeder;

class AprendizSeeder extends Seeder
{
    public function run(): void
    {
        Aprendiz::factory()->count(25)->create();
    }
}
