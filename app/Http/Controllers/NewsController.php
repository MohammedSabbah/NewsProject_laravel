<?php

namespace App\Http\Controllers;

use App\Entities\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    // for images we need to make image table and make one to many relation and use with()
    public function getMainNews()
    {
        return News::getLatest()
            ->where('is_main', '=','1')
            ->with('images')
            ->select('id', 'title', 'type', 'seo_description', 'category')
            ->take(4)->get();
    }

    public function getFiveNews()
    {
        return News::getLatest()
            ->where('is_in_five', '=', '1')
            ->with('images')
            ->select('id', 'title', 'type', 'seo_description', 'category')
            ->take(5)->get();
    }

    public function getRestNews()
    {
        return News::getLatest()
            ->where([
            ['is_in_five', '=', '0'],
            ['is_main', '=', '0'],
            ])
            ->with('images')
            ->select('id', 'title', 'type', 'seo_description', 'category')
            ->take(5)->get();
    }

    public function getLocalNews()
    {
        return News::getLatest()
            ->where('category', 'like', '%محلي%')
            ->with('images')
            ->select('id', 'title', 'type', 'seo_description', 'category')
            ->take(6)->get();
    }



    public function getInternationalNews()
    {
        return News::getLatest()
            ->where('category', 'like', '%دولي%')
            ->with('images')
            ->select('id', 'title', 'type', 'seo_description', 'category')
            ->take(6)->get();
    }

    public function getSingleNews($id)
    {
        $news = News::where('id', $id)->first();
        $news->views += 1;
        $news->save();
        $sNews = News::where('id', '=', $id)
            ->with(array('tags'=>function($query){
                $query->select('id','name');
            }))
            ->with('images');
        return $sNews->get();
    }

    public function getNewsByCategory($id)
    {
        $news = News::where('category_id' , $id)
            ->select('id', 'title', 'seo_description', 'category')
            ->with('images')
            ->get();
        return $news;
    }



    public function getRelatedNews($id, $num)
    {
        // here we retrieve $num posts that have any of the tags in the $id news.
        // we use wherehas, which is used to make a query on the many to many relation.
        // for example, we used it to access all the news which has a tags id founded in ids array
        $news = News::findOrFail($id);
        $ids = $news->tags()->pluck('id');
        $posts = News::whereHas('tags', function($q) use ($ids)
        {
            $q->whereIn('id', $ids);
        })
            ->select('id', 'title', 'seo_description', 'category')
            ->orderBy('created_at', 'decs')
            ->with('images')
            ->take($num)
            ->get();

        return $posts;
    }

    public function getLatestNews($num)
    {
        return News::getLatest()
            ->select('id', 'title', 'seo_description', 'category')
            ->orderBy('created_at', 'desc')
            ->with('images')
            ->take($num)
            ->get();
    }

    public function getMostWatchedNews()
    {
        return News::where( 'created_at', '>', Carbon::now()->subDays(7))
            ->orderBy('views', 'desc')
            ->select('id', 'title', 'seo_description', 'category')
            ->with('images')
            ->get();
    }

    public function getYesterdayNews()
    {
        $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
        $countYesterday = News::whereDate('created_at', $yesterday )
            ->select('id', 'title', 'seo_description', 'category')
            ->with('images')
            ->take(5)
            ->get();
        return $countYesterday;
    }

    public function getNumRecipes($num)
    {
        return News::where('category', 'like' ,'%طبخ%')
            ->orderBy('created_at', 'desc')
            ->take($num)
            ->with('images')
            ->get();
    }
}
