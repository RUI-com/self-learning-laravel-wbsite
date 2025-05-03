<?php
// في ملف SelfLearningController.php

namespace App\Http\Controllers;

use App\Models\SelfLearning;
use Illuminate\Support\Facades\Auth;

class SelfLearningController extends Controller
{
    public function index()
    {
        // استرجاع البوستات الخاصة بالمستخدم الحالي
        $posts = SelfLearning::where('user_id', Auth::id())->paginate(10);

        // تمرير البوستات إلى الصفحة home.blade.php
        return view('screen.home', compact('posts'));
    }
}

