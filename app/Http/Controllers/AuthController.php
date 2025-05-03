<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // عرض صفحة التسجيل
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // معالجة التسجيل
    public function register(Request $request)
    {
        
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // إنشاء المستخدم
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        // تسجيل الدخول التلقائي
        Auth::login($user);
    
        // تحويل المستخدم بعد التسجيل
        return redirect()->route('home');
    }
    


    // ✅ عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ✅ معالجة تسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // البحث عن المستخدم في قاعدة البيانات باستخدام الإيميل
        $user = User::where('email', $request->email)->first();
    
        // التحقق من تطابق كلمة المرور المدخلة مع كلمة المرور المخزنة
        if ($user && $user->password === $request->password) {
            // تسجيل الدخول
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/home'); // أو الصفحة الرئيسية
        }
    
        // في حال فشل التحقق
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ]);
    }
    
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('wellcome');
}

}
