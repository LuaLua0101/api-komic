<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comic;

class ApiController extends Controller
{

    public function testApi()
    {
        return 'OK';
    }

    public function getComics()
    {
        $comics = Comic::get();
        return response()->json([$comics], 200);
    }
}