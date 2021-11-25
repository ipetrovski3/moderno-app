<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
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
        return view('dashboard.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required',
                'title' => 'required',
                'description' => 'required'
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
