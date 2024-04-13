<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke()
    {
        $k = [
            'name' => 'kirill',
            'age' => 19
        ];
        return $k;
    }
}
