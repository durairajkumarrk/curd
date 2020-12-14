<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book;
use Illuminate\Support\Facades\Validator;
use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->toArray();        
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'isbn' => 'required|unique:books|min:5',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $book = new Book();
        $book->name = $request->name;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->user_id = Auth::user()->id;
        $book->save();
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'isbn' => 'required|min:5|unique:books,isbn,'.$id,
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $book = Book::find($id);
        $book->name = $request->name;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->save();
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $book = Book::find($id);
      $book->delete();
      return redirect('/books');
    }
}
