<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clientes_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) {
            DB::table('clientes')->insert(array(
                'name' => 'Carlos',
                'surname' => 'Aguilar Sanchez',
                'name_empresa' => 'Software ILS',
                'direccion' => 'Arequipa San miguel 19 - mz 7',
                'observaciones' => 'El cliente casi siempre se muestra a las 8am para llevarlo a su trabajo'
            ));

            DB::table('clientes')->insert(array(
                'name' => 'Maria Lany',
                'surname' => 'Sori Guzman',
                'name_empresa' => 'Yern Create',
                'direccion' => 'Alto selva alegre lt10-mz 118',
                'observaciones' => 'La señora siempre llama cuando anda comprando asi que lleva cosas para su casa.'
            ));
        }

        $this->command->info('La tabla clientes a sido llenada.');
    }
}
