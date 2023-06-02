<div class="relative">

    <div class="font-poppins antialiased">
        <div id="view" class="h-full w-screen flex flex-row" x-data="{ open: false }">

            <button @click="open = ! open"
                class="md:hidden absolute top-0 left-0 p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100
                focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div id="sidebar" :class="{'block': open, 'hidden': ! open}"
                class="absolute top-20 bg-white h-screen hidden md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out">

                <div class="space-y-6 md:space-y-10 mt-10">

                    <?php echo e($head); ?>


                    
                    <?php echo e($search); ?>


                    <div id="menu" class="flex flex-col space-y-2">

                        


                        <?php $__currentLoopData = $sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo get_defined_vars()[$sidebar]; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php echo e($items); ?>


</div>
<?php /**PATH /var/www/natan_blog/resources/views/components/sidebar.blade.php ENDPATH**/ ?>