<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الصفحة الرئيسية</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F2F6F9] flex items-center justify-center min-h-screen relative">

    <!-- خلفية زخرفية -->
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#F1C7B1] to-[#E691BD] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <!-- صورة iPhone -->
    <div class="absolute top-[-60px] left-1/2 transform -translate-x-1/2 z-10">
        <img src="<?php echo e(asset('storage/images/iPhone 15 Mockup Close Up Poster Freepik.png')); ?>" alt="iPhone 15 Mockup" class="mx-auto w-64">
    </div>

    <!-- المربع الرئيسي -->
    <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-sm text-center relative z-10">
        <!-- اللوغو -->
        <img src="<?php echo e(asset('storage/images/logo-self.png')); ?>" alt="Logo" class="mx-auto h-16 mb-6">

        <!-- رسالة ترحيبية -->
        <p class="text-lg font-semibold text-[#4A4A4A] mb-6">
            مرحباً بك في تطبيقنا! نحن هنا لخدمتك وتوفير أفضل تجربة لك.
        </p>

        <!-- الأزرار -->
        <a href="<?php echo e(route('login')); ?>" class="block bg-[#E691BD] text-white font-semibold py-2 px-4 rounded mb-4">تسجيل الدخول</a>
        <a href="<?php echo e(route('register')); ?>" class="block bg-[#F4F4F4] hover:bg-[#B6CDEA] text-gray-800 font-semibold py-2 px-4 rounded">إنشاء حساب</a>
    </div>

</body>
</html>
<?php /**PATH E:\laravel\self-learning\resources\views/page/wellcome.blade.php ENDPATH**/ ?>