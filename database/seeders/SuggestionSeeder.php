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
            'title'=>"Bluey",
            'image'=>"https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/814quYUniGL.jpg",
            'url'=>"https://youtu.be/7dUpS_8ciRc",
            'description'=>"Serie animada australiana para preescolares",
         ]);

         DB::table('suggestions')->insert([
            'title'=>"A, B, C, CH, D",
            'image'=>"https://pbs.twimg.com/media/Ey2-9CbWQAAf3Ct?format=jpg",
            'url'=>"https://www.youtube.com/watch?v=CjKX3X-ZKzw",
            'description'=>"Marta Gómez, canción del abecedario.",
         ]);

         DB::table('suggestions')->insert([
            'title'=>"Flash cards",
            'image'=>"https://images.squarespace-cdn.com/content/v1/6029f224610d6f1042e8e48e/1613995847616-4VTJIKLXM6QLHV7KGH9S/FotoABC_01.JPG",
            'url'=>"https://www.micukids.com/",
            'description'=>"Tartejas borrables bilingües del abecedario",
         ]);
 
         DB::table('suggestions')->insert([
             'title'=>"Bluey",
             'image'=>"https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/814quYUniGL.jpg",
             'url'=>"https://youtu.be/7dUpS_8ciRc",
             'description'=>"Serie animada australiana para preescolares",
          ]);
 
          DB::table('suggestions')->insert([
             'title'=>"A, B, C, CH, D",
             'image'=>"https://pbs.twimg.com/media/Ey2-9CbWQAAf3Ct?format=jpg",
             'url'=>"https://www.youtube.com/watch?v=CjKX3X-ZKzw",
             'description'=>"Marta Gómez, canción del abecedario.",
          ]);
    }
}
