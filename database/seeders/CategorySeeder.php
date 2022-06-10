<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
            'Accion'=>'Aventura y dessenfreno sin igual',
            'Ciencia Ficción'=>'Historias que nos llevan al límite de la imaginación',
            'Terror'=>'Prepárate para ponerte con la piel de gallina',
            'Fábulas'=>'Cuentos cortos para todos los públicos',
            'Histórico'=>'Basado en hechos reales'
        ];

        foreach($array as $k=>$v){
            \App\Models\Category::factory()->create([
                     'nombre'=>$k,
                     'descripcion'=>$v
                 ]);

        }


    }
}
