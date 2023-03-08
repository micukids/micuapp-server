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
}
?>
