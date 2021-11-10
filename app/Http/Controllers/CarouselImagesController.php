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
        $request->validate([
            'image' => 'required'
        ],
        [
            'image.required' => 'Глуп еден, слика не си прикачил!'
        ]);
        
        $image = new CarouselImage;

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

    public function activate(Request $request) {
        $image = CarouselImage::find($request->image_id);
        $image->active = $request->status;
        $image->save();

        if ($image->active == true) {
            $body = 'Успешно активирана сликата на насловната страна';
            $class = 'success';
        } else {
            $body = 'Успешно тргната сликата од насловната страна';
            $class = 'warning';
        }

        return response()->json(['body' => $body, 'class' => $class]);
    }

}
