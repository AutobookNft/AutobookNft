<div id="profile" class="space-y-3">
    <img src="<?php echo e($image); ?>" alt="head photo page" title='head photo page'
        class="w-10 md:w-16 rounded-full mx-auto" />
    <div>
        <h2 class="font-medium text-lg text-center text-teal-500">
            <?php echo e($name); ?>

        </h2>
        <p class="text-xs text-gray-500 text-center"><?php echo e($type); ?></p>
        <div class= 'mt-4'><p class="text-sm text-black font-semibold text-center"><?php echo e('Page: '); ?> <?php echo e($pagename); ?></p></div>
    </div>
</div>
<?php /**PATH /var/www/natan_blog/resources/views/components/sidebarhead.blade.php ENDPATH**/ ?>