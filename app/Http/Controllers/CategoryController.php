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

    // Destroy the specified category
    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect with success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}