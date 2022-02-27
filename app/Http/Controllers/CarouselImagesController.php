<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use App\Models\Category;
use Illuminate\Http\Request;

class CarouselImagesController extends Controller
{
    public function index()
    {
        $images = CarouselImage::all();

        return view('dashboard.carousel.index', compact('images'));
    }

    public function new()
    {
        $categories = Category::where('active', true)->get();
        return view('dashboard.carousel.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required',
                'title' => 'required',
                'description' => 'required',
                'url' => 'required'
            ],
            [
                'image.required' => 'Глуп еден, слика не си прикачил!'
            ]
        );

        $image = new CarouselImage;
        $image->title = $request->title;
        $image->description = $request->description;

        $request->file('image')->store('main', 'public');
        $image->image = $request->file('image')->hashName();

        $category_url = route('categories.show', $request->url);
        $image->url = $category_url;

        $image->save();

        return redirect()->route('images.index');
    }

    public function update()
    {
    }

    public function destroy($id)
    {
        $image = CarouselImage::findOrFail($id);
        $image->delete();

        return redirect()->route('images.index');
    }

    public function activate(Request $request)
    {
        $image = CarouselImage::find($request->id);
        $status = $request->status;

        $response = $this->change_status($image, $status);

        return response()->json($response);
    }
}
