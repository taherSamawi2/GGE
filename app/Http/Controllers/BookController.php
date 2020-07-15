<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\Http\Resources\Book as BookResource;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /* show All Books */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index',['books' => $books]);
    }

    //show a single Book
    public function show(Book $book)
    {
        return view('admin.books.edit',['book' => $book]);
    }

    //show a create Book
    public function create(Book $book)
    {
        return view('admin.books.create',['book' => $book]);
    }

    public function Save($request ,$book)
    {
        $book->setTranslation('name', 'en', $request->en_name);
        $book->setTranslation('name', 'ar', $request->ar_name);

        if($request->has('book') && $request->has('book_img')) {
            $book->addMedia($request->book)->toMediaCollection('books');
            $book->addMedia($request->book_img)->toMediaCollection('books_images');
        }
        $book->save();
        return $book;
    }

    // save the new Book
    public function store(BookRequest $request)
    {
        $book  = $this->Save($request,new Book());
        return redirect(route('books.index'));
    }


    // show a view to edit Book
    public function edit(Book $book){
        return new BookResource($book);
        return view('admin.books.edit',['book' => $book]);
    }

    // persist the edited Book
    public function update(Request $request,Book $book )
    {
        $book  = $this->Save($request,$book);
        return redirect(route('books.index'));
    }

    // Delete Book
    public function delete(Book $book){
        $book->delete();
        return redirect(route('books.index'));

    }
}
