<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Letter;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::all();
        return response()->json([ 
            "letters" => $letters
        ]);

    }
    public function showvowels(){
        $vowels = Letter::showvowels();
        return response()->json([ 
            "vowels" => $vowels
        ]);
    }
   
}
?>
