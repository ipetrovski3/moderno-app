<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Helpers;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.categories.index')
            ->with([
                'categories' => $categories,
            ]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        // dd(mb_detect_encoding($request->name));
        // dd(utf8_encode($request->name));
        
        $category->slug = 'develop';
        $request->file('image')->store('categories', 'public');
        $category->image = $request->file('image')->hashName();

        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit(category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, category $category)
    {
        $category->name = $request->name;

        if ($request->has('image')) {
            $request->file('image')->store('categories', 'public');
            $category->image = $request->file('image')->hashName();
        }

        $category->update();

        return redirect()->route('categories.index');
    }

    public function active(Request $request) {
        $category = Category::findOrFail($request->id);
        $status = $request->status;

        $response = $this->change_status($category, $status);

        return response()->json($response);
    }

    public function destroy(category $category)
    {
        //
    }
}
