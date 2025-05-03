<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SelfLearningController;
Route::get('/', function () {
    return view('page.wellcome');
})->name('wellcome');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('/home', [SelfLearningController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/import-images', function () {
    $files = Storage::files('public/images');

    foreach ($files as $file) {
        $filename = basename($file);

        // تأكدي ما تنعاد
        if (!Image::where('filename', $filename)->exists()) {
            Image::create([
                'filename' => $filename,
                'path' => $file, // ممكن يكون 'images/'.$filename كمان
            ]);
        }
    }

    return 'تمت إضافة الصور للقاعدة بنجاح!';
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/search', function () {
    return view('screen.search'); // صفحة البحث
});

Route::get('/favorites', function () {
    return view('screen.favorites'); // صفحة المفضلة
});

Route::get('/profile', function () {
    return view('screen.profile'); // صفحة الملف الشخصي
});
Route::get('/add-post', function () {
    return view('posts.addpost'); // صفحة المفضلة
});
use App\Http\Controllers\PostController;

// مسار لعرض نموذج إضافة البوست
Route::get('/post/create', [PostController::class, 'create'])->name('posts.addpost');

// مسار لتخزين البوست الجديد في قاعدة البيانات
Route::post('/add-post', [PostController::class, 'store'])->name('posts.addpost');
