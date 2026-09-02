<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Acao', 'Comedia', 'Drama', 'Ficcao cientifica', 'Terror'] as $nome) {
            Categoria::firstOrCreate(['nome' => $nome]);
        }
    }
}
