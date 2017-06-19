<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuranController extends Controller
{
    public function pray()
    {
        $json = json_decode(file_get_contents('http://muslimsalat.com/Gaza/daily.json?key=4e7f688c678d6c3960e2cb122dab1eca'), true);
        return $json['items'];
    }
}
