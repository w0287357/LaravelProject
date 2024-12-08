<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|unique:items,sku|max:100',
            'picture' => 'required|image|max:2048',
        ]);

        $picturePath = $request->file('picture')->store('images', 'public');

        Item::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'sku' => $request->sku,
            'picture' => $picturePath,
        ]);

        return redirect()->route('items.index');
    }

    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|unique:items,sku,' . $id . '|max:100',
            'picture' => 'nullable|image|max:2048',
        ]);

        $item = Item::findOrFail($id);

        $picturePath = $item->picture;
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('images', 'public');
        }

        $item->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'sku' => $request->sku,
            'picture' => $picturePath,
        ]);

        return redirect()->route('items.index');
    }
}
