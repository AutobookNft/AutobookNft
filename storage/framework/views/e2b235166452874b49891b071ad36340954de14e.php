 <!-- Type -->
<div class="<?php echo e($class_input); ?>">
    <label for="type"
        class="block text-white text-sm font-bold mb-2"><?php echo e(__('Select a cover file')); ?>:</label>

        <select @change="isDisabled = false" name="filecover" id="filecover" wire:model.defer="state.fileCover" wire:change="bind"

            class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
            <option value="empty"><?php echo e(__('Empty')); ?></option>

            


            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->id .' ' .  $item->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </select>

        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-red-500"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>
<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/cover-select.blade.php ENDPATH**/ ?>