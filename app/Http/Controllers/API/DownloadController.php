<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Validator;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return response()->json([ 
            "downloads" => $downloads
        ]);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'thumb' => 'required|min:1|max:250',
            'url' => 'required|min:2|max:250',
            'description' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $download = new Download();
            $download->thumb = $request->thumb;
            $download->url = $request->url;
            $download->description = $request->description;

            $download->save();

            return response()->json([
                'status' => 200,
                'download' => $download,
                'message' => 'Descargable registrado correctamente!',
            ]);
        }
    }


    public function show($id)
    {
       $download = Download::find($id);

       return response()->json([
        'status' => 200,
        'download' => $download,
       ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'thumb' => 'required|min:1|max:250',
            'url' => 'required|min:2|max:250',
            'description' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $download = Download::findOrFail($request->id);
            $download->thumb = $request->thumb;
            $download->url = $request->url;
            $download->description = $request->description;

            $download->save();

            return $download;
        }
    }


    public function destroy($id)
    {
        $download = Download::destroy($id);

        return $download;
    }
}
