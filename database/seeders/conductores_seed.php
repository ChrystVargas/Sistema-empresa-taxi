<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class conductores_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) {
            DB::table('conductores')->insert(array(
                'nro_auto' => '77518520',
                'name' => 'Carlos',
                'surname' => 'Aguilar Sanchez',
                'dueno_auto' => 'Carlos Aguilar',
                'dni' => '73676657',
                'nro_brevete' => '965565-148',
                'direccion' => 'Arequipa Umacollo',
                'fecha_ingreso' => '2021-01-12',
                'observaciones' => 'Ninguna sobre el conductor'
            ));
        }

        $this->command->info('La tabla conductores a sido llenada.');
    }
}
