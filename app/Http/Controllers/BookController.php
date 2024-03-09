<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;


use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('publisher')->get();
        $publishers = Publisher::all(); 
        $categories = Category::all(); 
        return view('books.index', ['books' => $books, 'publishers' => $publishers, 'categories' => $categories]);
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        $categories = Category::all();
    
        return view('books.create', ['publishers' => $publishers, 'categories' => $categories]);
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'book_code' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'publisher_id' => 'required|exists:publishers,id',
        ]);
    
        $publisherName = Publisher::find($validatedData['publisher_id'])->name;
        $categoryName = Category::find($validatedData['category_id'])->name;
    
        $validatedData['publisher'] = $publisherName;
        $validatedData['category'] = $categoryName;
    
        Book::create($validatedData);
    
        return redirect()->route('books.index')->with('success', 'Data added successfully');
    }
    
    
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('edit', compact('book'));
    }

// Fungsi untuk meng-update data buku
public function update(Request $request, $id)
{
    $book = Book::find($id);
    $validatedData = $request->validate([
        'book_code' => 'required',
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'publisher_id' => 'required|exists:publishers,id',
    ]);

    $publisherName = Publisher::find($validatedData['publisher_id'])->name;
    $categoryName = Category::find($validatedData['category_id'])->name;

    $validatedData['publisher'] = $publisherName;
    $validatedData['category'] = $categoryName;

    $book->update($validatedData);

    return redirect()->route('books.index')->with('success', 'Book updated successfully');
}


    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
    
        if ($book) {
            $book->delete();
            return response()->json(['success' => 'Book deleted successfully.']);
        } else {
            return response()->json(['message' => 'Book not found.'], 404);
        }
    }
    
    


}
