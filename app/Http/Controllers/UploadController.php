<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function __invoke(Request $request)
    {
        $uploadFile = $request->file('image');
        Storage::disk('public')->put('projects/images',$uploadFile);
        $path = asset('storage/projects/images/' . $uploadFile->hashName());

        return response()->json([
            'data' => [
                'path' => $path
            ]
        ]);
    }
}
