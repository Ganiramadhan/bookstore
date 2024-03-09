<?php

namespace App\Http\Controllers;
use App\Models\Publisher;
use App\Models\Category;


use Illuminate\Http\Request;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all(); 
        $categories = Category::all(); 
        return view('assets.index', ['publishers' => $publishers, 'categories' => $categories]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function createCategory()
    {
        return view('categories.create');
    }

    public function storeCreateCategory(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan kategori baru
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('assets.index')->with('success', 'Category created successfully.');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['success' => 'Category deleted successfully']);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('edit-category', ['category' => $category]);
    }
    
    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('assets.index')->with('success', 'Category updated successfully');
    }


    public function Dashboard() {
        return view('books.Dashboard');
    }




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
        //
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
