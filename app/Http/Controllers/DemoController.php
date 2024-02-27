<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function uploadpage(){
        return view('Upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // adjust validation rules as needed
        ]);
    
        $imageNames = []; // Initialize the $imageNames array
    
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
    
                // Add the image name to the array
                $imageNames[] = $imageName;
            }
            // Return with success message and image names
            return back()->with('success', 'Images uploaded successfully')->with('images', $imageNames);
        }
    }
    
}
    

