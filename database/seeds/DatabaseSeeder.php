<?php

use Illuminate\Database\Seeder;
use App\Evaluado;
use App\Evaluador;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EvaluadoSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(CompetenciaSeeder::class);
        $this->call(FrecuenciaSeeder::class);
    }


}
