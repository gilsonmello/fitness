<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\News;

class NewsController extends Controller
{
    public function index(News $news){
        $notices = $news->all();
        return view('backend.news.index', compact('notices'));
    }

    public function edit($id){
        $news = News::find($id);
        return view('backend.news.edit', compact('news'));
    }

}
