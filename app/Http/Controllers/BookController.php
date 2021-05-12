<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book_category;
use App\Department;
use Auth;
use App\Book;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

     $departments=Department::all();
     $categories=Book_category::all();
     $books=Book::orderby('name','ASC')->get();
     return view('books.index',compact('categories','departments','books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'author'=>'required|string',
            'code'=>'required|string',
            'category'=>'required|string',
            
        ]);
      
       $name=$request->name;
       $author=$request->author;
       $code=$request->code;
       $category_id=$request->category;
       

       $books =new Book;
       $books->name=$name;
       $books->author=$author;
       $books->code=$code;
       $books->bookcat_id=$category_id;
       $books->status=1;
       $books->save();
        // $id=$books->id;
       

       // $pivote=DB::table('book_borrower')->insert([
       //          [
       //          'book_id' => $id,
       //           'borrower_id' => $borrower_id,
       //       ]
       //      ]);

return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books=Book::findOrFail($id);
         $book_categories=Book_category::all();
        return view('books.edit',compact('books','book_categories'));
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
         $request->validate([
       'name'=>'required|string',
      'author'=>'required|string',
      'code'=>'required|string',
      'category'=>'required|string',
    ]);
        
    $name=$request->name;
    $author=$request->author;
    $code=$request->code;
    $bookcat_id=$request->category;
    $books=Book::findOrFail($id);
    $books->name=$name;
    $books->author=$author;
    $books->code=$code;
    $books->bookcat_id=$bookcat_id;
    $books->save();
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
        if (Book::where('id', $id)->delete()) {
            return redirect()->back();
        }else{
             return redirect()->back();
        }
    }
}
