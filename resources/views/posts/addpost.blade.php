<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إضافة بوست جديد</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <div class="fixed top-0 left-0 right-0 bg-white shadow-md z-10">
        <nav class="flex justify-between items-center p-4">
            <!-- Back Button -->
            <div class="flex space-x-4">
                <a href="/home" class="text-gray-600 hover:text-blue-600">
                    <i class="fi fi-rr-arrow-left"></i> العودة
                </a>
            </div>

            <!-- Logo -->
            <div class="text-center flex-grow">
                <img src="{{ asset('storage/images/world-self.png') }}" alt="Logo" class="mx-auto h-10">
            </div>
        </nav>
    </div>

    <!-- Add Post Form -->
    <div class="max-w-lg mx-auto mt-24 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">إضافة بوست جديد</h2>
        <form action="{{ route('posts.addpost') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @if(Auth::check())
    <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="mb-4">
@else
    <p>من فضلك قم بتسجيل الدخول أولاً.</p>
@endif



            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium">العنوان</label>
                <input type="text" id="title" name="title" class="w-full p-2 mt-2 border border-gray-300 rounded-md" placeholder="أدخل عنوان البوست" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium">الوصف</label>
                <textarea id="description" name="description" class="w-full p-2 mt-2 border border-gray-300 rounded-md" placeholder="أدخل وصف البوست" rows="4" required></textarea>
            </div>

            <!-- Media Upload -->
            <div class="mb-4">
                <label for="media" class="block text-gray-700 font-medium">اختر صورة</label>
                <input type="file" id="media" name="media" accept="image/*" class="w-full p-2 mt-2 border border-gray-300 rounded-md" onchange="previewImage(event)" required>
            </div>

            <!-- Image Preview -->
            <div id="image-preview" class="mb-4">
                <img id="preview-img" src="#" alt="Image Preview" class="w-full h-auto hidden">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-700">إضافة البوست</button>
            </div>
            @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        </form>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview-img');
                preview.src = reader.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
