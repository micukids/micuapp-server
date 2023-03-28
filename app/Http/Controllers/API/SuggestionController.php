<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::all();
        return response()->json([ 
            "suggestions" => $suggestions
        ]);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:8|max:50',
            'url' => 'required|min:5|max:250',
            'image' => 'required|max:250',
            'description' => 'required|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $suggestion = new Suggestion();
            $suggestion->title = $request->title;
            $suggestion->url = $request->url;
            $suggestion->image = $request->image;
            $suggestion->description = $request->description;

            $suggestion->save();

            return response()->json([
                'status' => 200,
                'suggestions' => $suggestion->title,
                'message' => 'Recomendado registrado correctamente!',
            ]);
        }
    }


    public function show($id)
    {
       $suggestion = Suggestion::find($id);

       return response()->json([
        'status' => 200,
        'suggestion' => $suggestion,
       ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:8|max:50',
            'url' => 'required|min:5|max:250',
            'image' => 'required|max:250',
            'description' => 'required|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $suggestion = Suggestion::findOrFail($request->id);
            $suggestion->title = $request->title;
            $suggestion->url = $request->url;
            $suggestion->image = $request->image;
            $suggestion->description = $request->description;

            $suggestion->save();

            return $suggestion;
        }
    }

    public function destroy($id)
    {
        $suggestion = Suggestion::destroy($id);

        return $suggestion;
    }
}
