<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /* show All News */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index',['news' => $news]);
    }

    //show a single News
    public function show(News $news)
    {
        return view('admin.news.edit',['news' => $news]);
    }

    //show a create News
    public function create(News $news)
    {
        return view('admin.news.create',['news' => $news]);
    }

    public function Save($request ,$news)
    {
        $news->setTranslation('title', 'en', $request->en_title);
        $news->setTranslation('title', 'ar', $request->ar_title);
        $news->setTranslation('content', 'en', $request->en_content);
        $news->setTranslation('content', 'ar', $request->ar_content);

        if($request->has('news_img')) {
            $news->addMedia($request->news_img)->toMediaCollection('news_images');
        }

        $news->save();
        return $news;
    }

    // save the new News
    public function store(NewsRequest $request)
    {
        $news  = $this->Save($request,new News());
        return redirect(route('news.index'));
    }


    // show a view to edit News
    public function edit(News $news){
        return view('admin.news.edit',['news' => $news]);
    }

    // persist the edited News
    public function update(Request $request,News $news )
    {
        $news  = $this->Save($request,$news);
        return redirect(route('news.index'));
    }

    // Delete News
    public function delete(News $news){
        $news->delete();
        return redirect(route('news.index'));
    }
}
