<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل حساب جديد</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#F2F6F9] flex items-center justify-center h-screen">

    <form method="POST" action="<?php echo e(route('register')); ?>" class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
        <?php echo csrf_field(); ?>
        <!-- اللوغو -->
        <img src="<?php echo e(asset('storage/images/logo-self.png')); ?>" alt="Logo" class="mx-auto h-16 mb-6">

        <h2 class="text-2xl font-bold mb-6 text-center text-[#4A4A4A]">تسجيل حساب جديد</h2>
        <?php if($errors->any()): ?>
    <div class="text-red-500">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

        <!-- الاسم -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">الاسم الكامل</label>
            <input type="text" name="name" id="name" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#E691BD] focus:border-[#E691BD]" />
        </div>

        <!-- البريد -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#E691BD] focus:border-[#E691BD]" />
        </div>

        <!-- كلمة المرور -->
        <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
<input type="password" name="password" id="password" required
    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#E691BD] focus:border-[#E691BD]" />
<small class="text-gray-500 text-xs">يجب أن تكون 8 محارف على الأقل.</small>

        </div>

        <!-- تأكيد كلمة المرور -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#E691BD] focus:border-[#E691BD]" />
        </div>

        <button type="submit"
            class="w-full bg-[#E691BD] text-white py-2 px-4 rounded hover:bg-[#F1C7B1] transition">إنشاء الحساب</button>
    </form>

</body>
</html>
<?php /**PATH E:\laravel\self-learning\resources\views\auth\register.blade.php ENDPATH**/ ?>