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

    public function store(Request $request)
    {
        $letter = new Letter();
        $letter->name = $request->name;
        $letter->parent = $request->parent;
        $letter->audio = $request->audio;
        $letter->image = $request->image;
        $letter->video = $request->video;

        $letter->save();

        return $letter;
    }


    public function show($id)
    {
       $letter = Letter::find($id);

       return $letter;
    }


    public function update(Request $request, $id)
    {
        $letter = Letter::findOrFail($request->id);
        $letter->name = $request->name;
        $letter->parent = $request->parent;
        $letter->audio = $request->audio;
        $letter->image = $request->image;
        $letter->video = $request->video;

        $letter->save();

        return $letter;
    }


    public function destroy($id)
    {
        $letter = Letter::destroy($id);

        return $letter;
    }
   
}
?>
