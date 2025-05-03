<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
        @csrf
         <!-- اللوغو -->
         <img src="{{ asset('storage/images/logo-self.png') }}" alt="Logo" class="mx-auto h-16 mb-6">
        <h2 class="text-2xl font-bold mb-6 text-center">تسجيل الدخول</h2>
        @if ($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" />
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" />
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition">تسجيل الدخول</button>
    </form>
</body>
</html>
