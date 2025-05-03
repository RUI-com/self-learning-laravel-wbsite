<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تطبيقي - الصفحة الرئيسية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>
<body class="antialiased bg-gray-100">
   <!-- Navigation Bar at the top -->
   <div class="fixed top-0 left-0 right-0 bg-white shadow-md z-10">
        <nav class="flex justify-between items-center p-4">
            <!-- أيقونة الرسائل على اليسار -->
            <div class="flex space-x-4">
                <a href="#" class="text-gray-600 hover:text-blue-600">
                <i class="fi fi-br-search"></i>
                </a>
            </div>

            <!-- اللوغو في المنتصف -->
            <div class="text-center flex-grow">
            <img src="{{ asset('storage/images/world-self.png') }}" alt="Logo" class="mx-auto h-10 ">
            </div>

            <!-- أيقونة الدردشة على اليمين -->
            <div class="flex space-x-4">
                <a href="#" class="text-gray-600 hover:text-blue-600">
                <i class="fi fi-rr-paper-plane"></i>
                </a>
            </div>
        </nav>
    </div>
    
    <!-- زر إضافة بوست جديد فوق شريط التنقل السفلي -->
    <div class="absolute bottom-24 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white rounded-full p-4 shadow-lg z-20">
        <a href="/add-post" class="flex items-center justify-center">
        <i class="fi fi-sr-layer-plus"></i>
        </a>
    </div>
<!-- في ملف home.blade.php الموجود في resources/views/screen -->


<div class="flex justify-center items-center h-[10vh]">
</div>

<!-- استعراض البوستات -->
<div class="container mx-auto my-8">
    @if($posts->isEmpty())
        <!-- إذا لم توجد بوستات، عرض الرسالة -->
        <div class="bg-white p-4 rounded-lg shadow-lg mb-4">
            <p class="text-gray-600 text-center">لا توجد بوستات لعرضها بعد!</p>
        </div>
    @else
        @foreach($posts as $post)
            <div class="bg-white p-6 rounded-lg shadow-lg mb-6 max-w-4xl mx-auto">
                <!-- اسم المستخدم -->
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden">
                        <!-- صورة المستخدم إذا كانت موجودة -->
                        @if($post->user->profile_image)
                            <img src="{{ asset('storage/'.$post->user->profile_image) }}" alt="User Image" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-400"></div>
                        @endif
                    </div>
                    <h2 class="ml-4 font-semibold text-xl text-gray-900">{{ $post->user->name }}</h2>
                </div>

               

                <!-- صورة البوست إن وجدت -->
                @if($post->media_url)
                    <img src="{{ asset('storage/'.$post->media_url) }}" alt="Post Media" class="w-full h-auto rounded-lg shadow-md">
                @endif
                 <!-- عنوان البوست -->
                 <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $post->title }}</h3>

<!-- وصف البوست -->
<p class="text-gray-700 text-base mb-4">{{ $post->description }}</p>

                <!-- خيارات مثل التعليقات أو الإعجابات -->
                <div class="flex justify-between items-center mt-4">
                    <button id="like-button-{{ $post->id }}" class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-full text-sm hover:bg-blue-600 transition duration-200">
                        <i id="like-icon-{{ $post->id }}" class="fi fi-rr-social-network mr-2"></i>
                        إعجاب
                    </button>
                    <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-gray-400 transition duration-200">
                        تعليق
                    </button>
                </div>
            </div>

            <script>
                // التعامل مع الضغط على زر الإعجاب
                document.getElementById('like-button-{{ $post->id }}').addEventListener('click', function() {
                    var icon = document.getElementById('like-icon-{{ $post->id }}');
                    // تغيير الأيقونة بناءً على حالة الضغط
                    if (icon.classList.contains('fi-rr-social-network')) {
                        icon.classList.remove('fi-rr-social-network');
                        icon.classList.add('fi-sr-thumbs-up');
                    } else {
                        icon.classList.remove('fi-sr-thumbs-up');
                        icon.classList.add('fi-rr-social-network');
                    }
                });
            </script>
        @endforeach
    @endif
</div>





    <!-- Navigation Bar at the bottom -->
   <div class="flex justify-center items-center">
        <nav class="bg-white shadow-md fixed bottom-0 z-10 flex py-2 px-6 rounded-xl max-w-96">
            <div class="flex space-x-8 w-full max-w-96 justify-center">
                <a href="/home" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white text-center flex flex-col items-center p-2 rounded-md">
                <i class="fi fi-sr-home"></i>
                    <span class="text-xs">الرئيسية</span>
                </a>
                <a href="/search" class="text-gray-600 hover:text-blue-600 text-center flex flex-col items-center">
                <i class="fi fi-br-square-terminal"></i>
                    <span class="text-xs">كورسات</span>
                </a>
                <a href="/favorites" class="text-gray-600 hover:text-blue-600 text-center flex flex-col items-center">
                <i class="fi fi-br-artificial-intelligence"></i>
                    <span class="text-xs">AI</span>
                </a>
                <a href="/profile" class="text-gray-600 hover:text-blue-600 text-center flex flex-col items-center">
                <i class="fi fi-br-user"></i>
                    <span class="text-xs">الملف الشخصي</span>
                </a>
            </div>
        </nav>
    </div>
</body>
</html>
