<?php
    $class_input="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
?>


<div class="relative flex flex-col bg-white rounded-lg shadow-md dark:bg-gray-800">


    <?php if($cardType=='zoom' || $cardType=='edit'): ?>
        <?php $url = url('dashboard/collection/items_zoom/'.$itemId) ?>
    <?php else: ?>
        <?php $url = url('dashboard/collection/items_edit/'.$itemId) ?>
    <?php endif; ?>

     <a href="<?php echo e($url); ?>" class = "p-2 justify-center">

        <?php if($itemType=='image'): ?>
            <img id='fileCover' name='fileCover' wire:model='thumbnail'  class="max-w-full rounded-lg" src="<?php echo e($fileCover); ?>" alt="product image" title="<?php echo e($imagetitle); ?>" />
        <?php else: ?>
            <img id='fileCover' name='fileCover' wire:model='file_Cover' class="max-w-full rounded-lg" src="<?php echo e($fileCover); ?>"  alt="product image" title="<?php echo e($imagetitle); ?>" />
        <?php endif; ?>

        <img src='/storage/images/default/logo_t.png' class="w-10 h-10 p-1 rounded-lg absolute top-2 left-1 right-0 bg-opacity-50">
        <div class='auto text-center text-lg font-semibold tracking-tight text-red-500 absolute top-2 left-0 right-0'> <?php echo e($title); ?></div>

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