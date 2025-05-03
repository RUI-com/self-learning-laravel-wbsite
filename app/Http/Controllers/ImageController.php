<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; // موديل الصور

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images', $filename, 'public');

        Image::create([
            'filename' => $filename,
            'path' => $path,
        ]);

        return back()->with('success', 'تم رفع الصورة بنجاح!');
    }
}

