<div>
    <div
        class="absolute top-20 left-20 lg:w-5/6 md:2/6 grid grid-cols-1 gap-4 p-2 rounded justify-items-start">
        <p class='font-medium text-white sm:text-4xl xl:text-7xl'> <?php echo e(__('Manage the Drop')); ?></p>
    </div>

    <?php
        $cardType='show';
        $show_traits_button=false;
        $collectionDrop='drop';
    ?>

    <div
        class="absolute top-60 left-20 lg:w-5/6 md:2/6
                grid xs:grid-cols-1 sm:grid-cols-2 ll:grid-cols-3 lg:grid-cols-4 
                1500:grid-cols-5 1700:grid-cols-7
                gap-4 p-2 rounded grid-flow-row">

        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($itemType=$item->type); ?>
            <?php switch($itemType):
                case ('image'): ?>
                    <?php ($cardType='show'); ?>
                    <?php ($fileCover=$item->thumbnail); ?>
                    <?php break; ?>
                <?php case ('audio'): ?>
                    <?php ($cardType='show'); ?>
                    <?php ($fileCover=$item->filecover); ?>
                    <?php break; ?>
                <?php case ('e-book'): ?>
                    <?php ($cardType='show'); ?>
                    <?php break; ?>
                <?php case ('video'): ?>
                    <?php ($cardType='show'); ?>
                    <?php break; ?>
                <?php default: ?>

            <?php endswitch; ?>
            <?php echo $__env->make("livewire.collections.collection-drop-item", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
            




<?php /**PATH /var/www/natan_blog/resources/views/livewire/drop-collection.blade.php ENDPATH**/ ?>