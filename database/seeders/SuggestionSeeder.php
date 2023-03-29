<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suggestions')->insert([
           'title'=>"Flash cards",
           'image'=>"https://play.micukids.com/play/sug/01_MicuFlashcards.jpg",
           'url'=>"https://www.micukids.com/",
           'description'=>"Tartejas borrables bilingües del abecedario",
        ]);

        DB::table('suggestions')->insert([
         'title'=>"A, B, C, CH, D",
         'image'=>"https://play.micukids.com/play/sug/02_MartaABCCHD.jpg",
         'url'=>"https://www.youtube.com/watch?v=CjKX3X-ZKzw",
         'description'=>"Marta Gómez, canción del abecedario.",
      ]);

        DB::table('suggestions')->insert([
            'title'=>"Sesame Street",
            'image'=>"https://play.micukids.com/play/sug/03_sesame.jpg",
            'url'=>"https://www.sesamestreet.org/",
            'description'=>"Serie pionera en el estándar educativo",
         ]);



         DB::table('suggestions')->insert([
            'title'=>"Caballito de mar",
            'image'=>"https://play.micukids.com/play/sug/04_caballito.jpg",
            'url'=>"https://www.youtube.com/watch?v=YgJvHUDd1iM",
            'description'=>"Cantoalegre, canción infantil",
         ]);
 
         DB::table('suggestions')->insert([
             'title'=>"Bluey",
             'image'=>"https://play.micukids.com/play/sug/05_bluey.jpg",
             'url'=>"https://youtu.be/7dUpS_8ciRc",
             'description'=>"Serie animada australiana para preescolares",
          ]);
 
    }
}
