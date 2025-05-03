<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تطبيقي - المفضلة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'></head>
<body class="antialiased bg-gray-100">

    <!-- Navigation Bar -->
  <!-- Navigation Bar -->
  <div class="flex justify-center items-center">
        <nav class="bg-white shadow-md fixed bottom-0  z-10 flex  py-2 px-6 rounded-xl  max-w-96">
            <div class="flex space-x-8 w-full max-w-96 justify-center">
            <a href="/home" class="text-gray-600 hover:text-blue-600 text-center flex flex-col items-center">
                <i class="fi fi-rr-home"></i>
               <span class="text-xs">الرئيسية</span>
                </a>
                <a href="/search" class="text-gray-600 hover:text-blue-600 text-center flex flex-col items-center">
                <i class="fi fi-br-square-terminal"></i>
                    <span class="text-xs">كورسات</span>
                </a>
                <a href="/favorites" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white text-center flex flex-col items-center p-2 rounded-md">
                <i class="fi fi-sr-artificial-intelligence"></i>
                    <span class="text-xs">AI</span>
                </a>
                <a href="/profile" class="text-gray-600 hover:text-blue-600 text-center flex flex-col items-center">
                <i class="fi fi-br-user"></i>
                    <span class="text-xs">الملف الشخصي</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- صفحة المفضلة -->
    <div class="flex justify-center items-center h-[80vh]">
        <h1 class="text-3xl font-bold text-gray-700">المفضلة</h1>
    </div>

</body>
</html>
