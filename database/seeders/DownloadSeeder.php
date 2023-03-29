<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('downloads')->insert([
            'thumb'=>"https://play.micukids.com/play/dl/thumb_01_poster.jpg",
            'url'=>"https://play.micukids.com/play/dl/01_Poster_Micukids.pdf",
            'description'=>"Poster del abecedario",
         ]);

         DB::table('downloads')->insert([
            'thumb'=>"https://play.micukids.com/play/dl/thumb_A.jpg",
            'url'=>"https://play.micukids.com/play/dl/A_micukids.pdf",
            'description'=>"Colorea la letra A",
         ]);

         DB::table('downloads')->insert([
            'thumb'=>"https://play.micukids.com/play/dl/thumb_E.jpg",
            'url'=>"https://play.micukids.com/play/dl/E_micukids.pdf",
            'description'=>"Colorea la letra E",
         ]);

         DB::table('downloads')->insert([
            'thumb'=>"https://play.micukids.com/play/dl/thumb_I.jpg",
            'url'=>"https://play.micukids.com/play/dl/I_micukids.pdf",
            'description'=>"Colorea la letra I",
         ]);

         DB::table('downloads')->insert([
            'thumb'=>"https://play.micukids.com/play/dl/thumb_O.jpg",
            'url'=>"https://play.micukids.com/play/dl/O_micukids.pdf",
            'description'=>"Colorea la letra O",
         ]);

         DB::table('downloads')->insert([
            'thumb'=>"https://play.micukids.com/play/dl/thumb_U.jpg",
            'url'=>"https://play.micukids.com/play/dl/U_micukids.pdf",
            'description'=>"Colorea la letra U",
         ]);
    }
}
