<?php
    $traits = App\Models\Item_traits::where('teams_items_id', $itemId)->get();
?>

<?php if(count($traits)>0): ?>
    <div class="relative bg-white rounded-lg shadow-md dark:bg-gray-800">

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
    </div>
<?php endif; ?>
<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/traits-for-item.blade.php ENDPATH**/ ?>