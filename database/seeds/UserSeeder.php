<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $array = [
            [
                'name' => 'Carlos Antonio',
                'email' => 'carlosantonio@doc88.com.br',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'Fernando Carvalho',
                'email' => 'fernandocar@doc88.com.br',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'Felicia Morais',
                'email' => 'feliciaM@doc88.com.br',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'Rubens Barriquelo',
                'email' => 'rubensBa@doc88.com.br',
                'password' => bcrypt('1234'),
            ],

        ];

        foreach ( $array as $item ) {
            $user->firstOrCreate($item);
        }
    }
}
