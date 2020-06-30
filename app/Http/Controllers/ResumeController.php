<?php

namespace App\Http\Controllers;

class ResumeController extends Controller
{
    public function __invoke()
    {
       return response()->json([
           'data' => [
               'cv_link' => asset('resume.pdf')
           ]
       ]);
    }
}
