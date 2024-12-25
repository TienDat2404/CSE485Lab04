<?php

namespace App\Http\Controllers;
use App\Models\Borrowbook;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;

class BorrowbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $borrows = Borrowbook::all();
        return view('borrowbooks.index', compact('borrows'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $readers = Reader::all();
        $books = Book::ALL();
        return view('borrowbooks.create', compact('readers', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'reader_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required'
        ]);

        $borrow = Borrowbook::create($request->all());
        
        // Update book status to unavailable
        Book::where('id', $request->book_id)
            ->update(['status' => false]);

        return redirect()->route('borrowbooks.index')
            ->with('success', 'Book borrowed successfully');
    
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $borrowbook = Borrowbook::find($id);
        return view('borrowbooks.show', compact('borrowbook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $readers = Reader::all();
        $books = Book::all();
        $borrowbook = Borrowbook::find($id);
        return view('borrowbooks.edit', compact('borrowbook', 'readers', 'books'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'reader_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required',
            'status' => 'boolean'
        ]);
        
        $borrow = Borrowbook::find($id);
        $borrow->update($request->all());
        return redirect()->route('borrowbooks.index')
            ->with('success', 'Borrow updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $borrow = Borrowbook::find($id);
        $borrow->delete();
        return redirect()->route('borrowbooks.index')->with('success', 'Borrow deleted successfully.');
    }

    
}
