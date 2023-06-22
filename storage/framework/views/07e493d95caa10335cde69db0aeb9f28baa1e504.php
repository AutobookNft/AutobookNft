<?php
$traits = App\Models\Item_traits::where('teams_items_id', $itemId)->get();
?>

<?php if(count($traits)>0): ?>
<<<<<<< HEAD:storage/framework/views/07e493d95caa10335cde69db0aeb9f28baa1e504.php
    <div class="relative bg-white rounded-lg shadow-md dark:bg-gray-800">
=======
<div class="relative bg-white rounded-lg shadow-md dark:bg-gray-800">
>>>>>>> e903259 (pseudo commit):storage/framework/views/f9b570ab519f9fd91ef73c0d66effc3b260133ab.php

    <div class="grid grid-cols-1 m-2 border border-gray-300">
        <table class="table-auto w-full text-left">
            <thead class="bg-gray-800 text-white">
                <th class="px-4 py-2">
                    <a href="<?php echo e(url('dashboard/collection/items_edit/'. $itemId . '/traits' )); ?>">
                        <?php echo e(__('Traits')); ?>

                    </a>
                </th>
            </thead>

            <tbody>
                <?php $__currentLoopData = $traits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="bg-orange-300">
                    <td class="border px-2 py-1"><?php echo e($item->title); ?></td>
                    <td class="border px-2 py-1"><?php echo e($item->description); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>
<<<<<<< HEAD:storage/framework/views/07e493d95caa10335cde69db0aeb9f28baa1e504.php
<?php endif; ?>
<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/traits-for-item.blade.php ENDPATH**/ ?>
=======
</div>
<?php endif; ?>
<?php /**PATH /home/forge/nftflorence.com/resources/views/livewire/collections/item-include/traits-for-item.blade.php ENDPATH**/ ?>
>>>>>>> e903259 (pseudo commit):storage/framework/views/f9b570ab519f9fd91ef73c0d66effc3b260133ab.php
