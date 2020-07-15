<?php

namespace App\Http\Controllers;

use App\Book;
use App\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('home');
    }

    /* Show All Books */
    public function allBooks()
    {
        $books = Book::all();
        return view('admin.books.index',['books' => $books]);
    }
    /* show All News */
    public function allNews()
    {
        $news = News::all();
        return view('admin.news.index',['news' => $news]);
    }
}
