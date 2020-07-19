<?php

use Illuminate\Database\Seeder;
use App\Models\Pathology;

class PathologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Pathology $pathology)
    {
        $array = [
             [
                'title' => 'Variula',
                'gravity' => 'Mediana',
                'cured' => 'Yes',
             ],
             [
                'title' => 'Covid-19',
                'gravity' => 'Alta',
                'cured' => 'Yes',
             ],
             [
                'title' => 'Febre Amarela',
                'gravity' => 'Alta',
                'cured' => 'Yes',
             ],
             [
                'title' => 'Diabetes',
                'gravity' => 'Baixa',
                'cured' => 'No',
             ],

        ];

        foreach ( $array as $item ) {
           $pathology->firstOrCreate($item);
        }
    }
}
