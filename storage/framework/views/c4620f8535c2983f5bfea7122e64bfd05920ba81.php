<div class="relative font-poppins antialiased" x-data="{ open: false }">

    <div class="z-50 ml-4 absolute top-[80px]">

        <button @click="open = !open"
            class="flex justify-end md:hidden p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': !open, 'inline -flex': open}" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

<<<<<<< HEAD:storage/framework/views/c4620f8535c2983f5bfea7122e64bfd05920ba81.php
    <div id="view" class="w-11/12 absolute top-[66px] z-10 ml-2 border border-green-500" :class="{'': open}">

        <div class="h-screen fixed w-[180px] md:w-[240px] bg-white hidden md:block shadow-xl px-3 transition-transform duration-300
                        ease-in-out rounded-lg" :class="{'w-[144]': open, 'hidden': !open}" id="sidebar">
=======
    <div id="view" class="flex flex-col w-11/12 absolute top-[66px] z-10 ml-2 border border-gray-500"
        :class="{'': open}">

        <div class="h-screen fixed w-[180px] md:w-[240px] bg-white hidden md:block shadow-xl px-3 transition-transform duration-300
                    ease-in-out rounded-lg" :class="{'w-[144]': open, 'hidden': !open}" id="sidebar">
>>>>>>> f0ed47c (unito locale con remoto):storage/framework/views/177b55162501be09879d3e18259f4de112478496.php

            <div class="mt-5 h-screen overflow-y-auto">
                <?php echo e($head); ?>


                
                

                
                <?php $__currentLoopData = $sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo get_defined_vars()[$sidebar]; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

<<<<<<< HEAD:storage/framework/views/c4620f8535c2983f5bfea7122e64bfd05920ba81.php
        <div class="absolute -top-[80px] w-screen flex justify-center mt-2">
=======
        <div class="absolute -top-[90px] w-screen flex justify-center mt-2">
>>>>>>> f0ed47c (unito locale con remoto):storage/framework/views/177b55162501be09879d3e18259f4de112478496.php
            <div class="">
                <?php echo e($bodyhead); ?>

            </div>
        </div>

<<<<<<< HEAD:storage/framework/views/c4620f8535c2983f5bfea7122e64bfd05920ba81.php
    <div class="z-20 absolute top-[140px] gap-6 md:left-[250px] grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 border border-red-600"
        :class="{'left-[195px] grid-cols-1': open, 'grid-cols-2 ml-4 mr-4': !open}">
=======
        <div class="z-20 absolute top-[140px] gap-6 md:left-[250px] grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6"
            :class="{'left-[195px] grid-cols-1': open, 'grid-cols-2 ml-4 mr-4': !open}">
>>>>>>> f0ed47c (unito locale con remoto):storage/framework/views/177b55162501be09879d3e18259f4de112478496.php

            <?php echo e($items); ?>


        </div>

    </div>

</div>
<?php /**PATH /var/www/natan_blog/resources/views/components/sidebar-edit-item.blade.php ENDPATH**/ ?>