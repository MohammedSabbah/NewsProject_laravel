<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComments($id)
    {
        $news = News::findOrFail($id);
        return $news->comments()->get();
    }
}
