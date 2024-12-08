<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Show the form to create a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store the new category in the database
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);

        // Create and save the category
        Category::create([
            'name' => $request->name,
        ]);

        // Redirect to the categories index page
        return redirect()->route('categories.index');
    }

    // Display the list of categories
    public function index()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Pass the categories to the view
        return view('categories.index', compact('categories'));
    }

    // Show the form to edit the category
    public function edit($id)
    {
        // Fetch the category by id
        $category = Category::findOrFail($id);

        // Pass the category to the edit view
        return view('categories.edit', compact('category'));
    }

    // Update the category in the database
    public function update(Request $request, $id)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id . '|max:255',
        ]);

        // Fetch the category by id
        $category = Category::findOrFail($id);

        // Update the category with new data
        $category->update([
            'name' => $request->name,
        ]);

        // Redirect to the categories index page
        return redirect()->route('categories.index');
    }
}