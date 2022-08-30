<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\Bootcamp;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1.leer el archivo de datos
        $json=File::get('database/_data/boootcamps.json');
        //2.convertir los datos en un arreglo
        $arreglo_bootcamps=json_decode($json);
        //3.recorrer el arreglo
        //var_dump($arreglo_usuarios);
        //4.por cada elemento del arreglo crear
        //un <<entity>>
        foreach($arreglo_bootcamps as $bootcamps){
            //4.registrar el usuario en db
            Bootcamp::create([
                "name" => $bootcamps->name,
                "description" => $bootcamps->description,
                "website" => $bootcamps->website,
                "phone" => $bootcamps->phone,
                "user_id" => $bootcamps->user_id
            ]);
        }
    }
}
