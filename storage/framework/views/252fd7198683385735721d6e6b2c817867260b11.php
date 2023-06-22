<?php
    $class_input="shadow appearance-none border rounded text-lg w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
?>


<div class="relative bg-white rounded-lg shadow-md dark:bg-gray-800">


    <?php if($cardType=='zoom' || $cardType=='edit'): ?>
        <?php $url = url('dashboard/collection/items_zoom/'.$itemId) ?>
    <?php else: ?>
        <?php $url = url('dashboard/collection/items_edit/'.$itemId) ?>
    <?php endif; ?>

     <a href="<?php echo e($url); ?>" class = "p-2 justify-center">

        
            <div class = "flex justify-center">
                <img id='fileCover' name='fileCover' class="max-h-[200px] rounded-xl p-1" src="<?php echo e($fileCover); ?>" alt="product image" title="<?php echo e($imagetitle); ?>" />
            </div>
        

        <img src=<?php echo e(env('LOGO_01')); ?> class="w-8 h-8 p-1 rounded-lg absolute top-[2px] left-2 right-0 bg-opacity-50">
        <div class='auto text-center text-lg font-semibold tracking-tight text-red-500 absolute top-[4px] left-0 right-0'> <?php echo e($title); ?></div>

    </a>

    <?php if( $itemType=='video' || $itemType=='audio'): ?>
        <?php echo $__env->make('livewire.collections.item-include.media-controller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    

    <div class="px-2.5 pb-2.5">

        

        <?php switch($cardType):

            case ('edit'): ?>
                <?php echo $__env->make('livewire.collections.item-include.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
            <?php case ('show'): ?>
                <?php echo $__env->make('livewire.collections.item-include.onlyread', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
            <?php case ('zoom'): ?>
                <?php echo $__env->make('livewire.collections.item-include.onlyread', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
            <?php case ('file'): ?>
                <?php echo $__env->make('livewire.collections.item-include.onlydelete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
            <?php default: ?>

        <?php endswitch; ?>

    </div>
</div>

<?php /**PATH /var/www/natan_blog/resources/views/components/collections/layout-item.blade.php ENDPATH**/ ?>