<?php

use Illuminate\Database\Seeder;
use App\Models\UsersXpathology;

class UsersXpathologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param UsersXpathology $usersXpathology
     * @return void
     */
    public function run(UsersXpathology $usersXpathology)
    {
        $array = [
            [
                'user_id' => 1,
                'pathology_id' => 1,
            ],
            [
                'user_id' => 2,
                'pathology_id' => 2,
            ],
            [
                'user_id' => 3,
                'pathology_id' => 3,
            ],
            [
                'user_id' => 4,
                'pathology_id' => 4,
            ],

        ];

        foreach ( $array as $item ) {
            $usersXpathology->firstOrCreate($item);
        }
    }
}
