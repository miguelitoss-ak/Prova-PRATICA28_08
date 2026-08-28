<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       Categoria::create(['nome' => 'Ação']);
         Categoria::create(['nome' => 'Comédia']);
            Categoria::create(['nome' => 'Drama']);
    }
}
