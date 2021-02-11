<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class users_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'name' => 'Cristian',
            'surname' => 'Vargas Ari',
            'email' => 'cristianvargasari@gmail.com',
            'username' => 'Cristian VA',
            'password' => Hash::make('19520'),
        ]);

        $this->command->info('El usuario fue registrado.');
    }
}
