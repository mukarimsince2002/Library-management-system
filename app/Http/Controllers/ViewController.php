<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = Book::find($id);
        return view('home.book_details',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Book::find($id);
        $book_id = $id;
        $quantity =  $data->quantity;
        if ($quantity >= 1) {
            if (Auth::id()) {
               $user_id=Auth::user()->id;
               $borrow = new Borrow;
               $borrow->book_id = $book_id;
               $borrow->user_id = $user_id;
               $borrow->status = 'Applied';
               $borrow->save();
               return redirect()->back()->with('message','A request is send to admin to borrow this book');
            }

            else
            {
                return redirect('/login');
            }
        }
        else{
            return redirect()->back()->with('message','Not enough book Available');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
