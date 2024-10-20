<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News\NewsModel;
use App\Models\Settings\SettingModel;

class RssFeedController extends Controller
{
    public function feed()
    {
        $posts = NewsModel::where('status', '1')->orderBy('id', 'desc')->limit(10)->get();
         $setting = SettingModel::where('id',1)->first();
        return response()->view('themes.rss.rss', compact('posts','setting'))->header('Content-Type', 'application/xml');

    }
}
