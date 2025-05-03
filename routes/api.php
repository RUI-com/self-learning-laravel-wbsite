<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Image;
// هذا المسار سيعيد قائمة المستخدمين
Route::get('/users', function () {
    return User::all();  // إرجاع كل البيانات من جدول المستخدمين
});


Route::get('/images', function () {
    return Image::all(); // إرجاع كل الصور من جدول images
});
Route::post('register', [AuthController::class, 'register']);