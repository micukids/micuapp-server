<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Letter;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'letter' => 'required|min:1|max:2',
            'type' => 'required|min:2|max:12',
            'sound' => 'required|max:250',
            'image' => 'required|max:250',
            'video' => 'required|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $letter = new Letter();
            $letter->letter = $request->letter;
            $letter->type = $request->type;
            $letter->sound = $request->sound;
            $letter->image = $request->image;
            $letter->video = $request->video;

            $letter->save();

            return response()->json([
                'status' => 200,
                'letter' => $letter->letter,
                'type' => $letter->type,
                'message' => 'Letra registrada correctamente!',
            ]);
        }
    }


    public function show($id)
    {
       $letter = Letter::find($id);

       return response()->json([
        'status' => 200,
        'theletter' => $letter,
       ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'letter' => 'required|min:1|max:2',
            'type' => 'required|min:2|max:12',
            'sound' => 'required|max:250',
            'image' => 'required|max:250',
            'video' => 'required|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $letter = Letter::findOrFail($request->id);
            $letter->letter = $request->letter;
            $letter->type = $request->type;
            $letter->sound = $request->sound;
            $letter->image = $request->image;
            $letter->video = $request->video;

            $letter->save();

            return $letter;
        }
    }


    public function destroy($id)
    {
        $letter = Letter::destroy($id);

        return $letter;
    }
   
}
?>
