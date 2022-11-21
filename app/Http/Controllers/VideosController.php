<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function Videos(Request $request)
    {
        return view('guia_registro');
    }
}
