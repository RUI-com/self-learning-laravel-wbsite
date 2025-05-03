<?php

namespace App\Http\Controllers;

use App\Models\SelfLearning;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // دالة لعرض النموذج الخاص بإضافة البوست
    public function create()
    {
        return view('posts.addpost');
    }

    // دالة لتخزين البوست الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        // تحقق من البيانات المدخلة (التأكد من تحميل صورة)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // إذا كانت الصورة موجودة، قم برفعها
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $mediaUrl = 'images/' . $imageName;
        } else {
            $mediaUrl = null;
        }

        // تخزين البيانات في قاعدة البيانات باستخدام SelfLearning
        $post = new SelfLearning();
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->media_url = $mediaUrl;
        $post->save();

        return redirect()->route('home')->with('success', 'تم إضافة البوست بنجاح');
    }
}
