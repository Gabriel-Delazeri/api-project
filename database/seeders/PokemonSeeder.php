<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://www.canalti.com.br/api/pokemons.json"; 
        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        $pokemons = json_decode(curl_exec($ch));
        $type = [];

        foreach($pokemons->pokemon as $Pokemon) {
            $type = [];
            foreach ($Pokemon->type as $t) {
                array_push($type, $t);
            }
                DB::table('pokemons')->insert([
                'name' => $Pokemon->name,
                'image_url' =>  $Pokemon->img,
                'attribute' => json_encode($type),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
