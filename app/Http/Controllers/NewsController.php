<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\News;

class NewsController extends Controller
{
    // for images we need to make image table and make one to many relation and use with()
    public function getMainNews()
    {
        return News::getLatest()->where('is_main', '=','1')->take(4)->get();
    }

    public function getFiveNews()
    {
        return News::getLatest()->where('is_in_five', '=', '1')->take(5)->get();
    }

    public function getRestNews()
    {
        return News::getLatest()->where([
            ['is_in_five', '=', '0'],
            ['is_main', '=', '0'],
            ])->take(5)->get();
    }

    public function getLocalNews()
    {
        return News::getLatest()->where('category', '=', 'محلي')->take(5)->get();
    }

    public function getInternationalNews()
    {
        return News::getLatest()->where('category', '=', 'دولي')->take(5)->get();
    }

//    public function test() // in this func we use file_get_contents which connect to url
//    {
//        $json = json_decode(file_get_contents('http://apilayer.net/api/live?access_key=3a5ec8477c6019b392612acbc8f2a35e'), true);
//    }

    public function pray()
    {
       $json = json_decode(file_get_contents('http://muslimsalat.com/Gaza/daily.json?key=4e7f688c678d6c3960e2cb122dab1eca'), true);
       return $json['items'];
    }

    public function getSingleNews($id)
    {
        $sNews = News::where('id', '=', $id)->get();
        return $sNews;
    }

}
