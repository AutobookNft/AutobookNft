<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <script src="https://kit.fontawesome.com/65e3d9e08a.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@perawallet/connect@latest/dist/index.min.js"></script>

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

        <?php echo \Livewire\Livewire::styles(); ?>


    </head>

    <body class="antialiased">

        <div class="relative min-h-screen">

            <?php if(Route::has('login')): ?>
                <div class="hidden fixed top-0 right-20 px-6 py-4 sm:block">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="text-md text-white underline">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-md text-white underline">Log in</a>
                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="ml-4 text-md text-white underline">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php echo e($slot); ?>


            <div class="relative inline-block text-left">
                <div class="fixed top-0 right-0 mt-4 mr-4">
                    <button onclick="toggleDropdown(event)" class="toggle-dropdown inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white hidden">
                        
                    </div>

                </div>
            </div>


            <?php echo \Livewire\Livewire::scripts(); ?>


        </div>
        <script src="/js/marquee3k.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Marquee3k.init();
            });
        </script>
        

    </body>
</html>



<script>
    function toggleDropdown(event) {
      const dropdownMenu = document.getElementById('dropdown-menu');

      if (event.target.closest('.toggle-dropdown') || dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.toggle('hidden');
      }
    }

    document.addEventListener('click', function (event) {
      const dropdownMenu = document.getElementById('dropdown-menu');

      if (!event.target.closest('.toggle-dropdown') && !dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.add('hidden');
      }
    });
</script>
<?php /**PATH /var/www/natan_blog/resources/views/layouts/guest.blade.php ENDPATH**/ ?>