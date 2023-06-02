<div class="min-w-full mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">

    <div class="grid grid-cols-1 m-2 border border-gray-300">
        <table class="table-auto w-full text-left">

            <thead class="bg-gray-800 text-white">
                <th class="px-4 py-2">
                    <a href="<?php echo e(url('dashboard/collection/item/utility/'. $itemId )); ?>">
                        <?php echo e(__('Utility')); ?>

                    </a>
                </th>
            </thead>

            <tbody>
                <tr class="bg-orange-300">
                    <td class="border px-2 py-1"><?php echo e($utility->util_description); ?></td>

                </tr>
                <tr class="bg-orange-300">
                    <td class="border px-2 py-1"><?php echo e($utility->util_code); ?></td>
                </tr>

            </tbody>
        </table>

        <table class="table-auto bg-orange-300 file:w-full text-left">
            <tbody>
                <?php if($utility->util_spec_1!=""): ?>
                <tr>
                    <td class="border px-2 py-1"><?php echo e(Str::words($utility->util_spec_1, 5, '...')); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($utility->util_spec_2!=""): ?>
                <tr>
                    <td class="border px-2 py-1"><?php echo e(Str::words($utility->util_spec_2, 5, '...')); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($utility->util_spec_3!=""): ?>
                <tr>
                    <td class="border px-2 py-1"><?php echo e(Str::words($utility->util_spec_3, 5, '...')); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($utility->util_spec_4!=""): ?>
                <tr>
                    <td class="border px-2 py-1"><?php echo e(Str::words($utility->util_spec_4, 5, '...')); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($utility->util_spec_5!=""): ?>
                <tr>
                    <td class="border px-2 py-1"><?php echo e(Str::words($utility->util_spec_5, 5, '...')); ?></td>
                </tr>
                <?php endif; ?>

                <?php
                $utility_files = App\Models\Utility_files::where('item_id', $utility->id)->paginate(8);
                ?>
            </tbody>
        </table>
        <div class="grid grid-cols-4 min-w-full">
            <?php $__currentLoopData = $utility_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e($file->hash_file); ?>" alt="attachment collection photo" title='attachment collection photo'
                class="col-span-1 p-1 w-10 h-10 rounded-full" />
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/utility-for-item.blade.php ENDPATH**/ ?>