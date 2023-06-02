<div class="container mx-auto py-8 mt-12">
    <div class="w-1/3 mx-auto">
        <div class="bg-white p-6 rounded-md shadow-md">
            <h2 class="text-xl font-bold mb-4 text-black"><?php echo e(__('Create Drop')); ?></h2>
            <form  wire:submit.prevent="create" x-data="{ isDisabled: true }">
                <div class="mb-4">
                    <label for="title" class="block mb-2 text-black"><?php echo e(__('Title')); ?></label>
                    <input @keydown="isDisabled = false" type="text" value='<?php echo e($title); ?>' wire:model="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-2 text-black"><?php echo e(__('Description')); ?></label>
                    <textarea @keydown="isDisabled = false" wire:model="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-4">
                    <label for="date_start" class="block mb-2 text-black"><?php echo e(__('Start Date')); ?></label>
                    <input @keydown="isDisabled = false" type="date" wire:model="date_start" id="date_start" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <?php $__errorArgs = ['date_start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-4">
                    <label for="date_end" class="block mb-2 text-black"><?php echo e(__('End Date')); ?></label>
                    <input @keydown="isDisabled = false" type="date" wire:model="date_end" id="date_end" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <?php $__errorArgs = ['date_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input @change="isDisabled = false" type="checkbox" id="ongoing" name="ongoing" class="sr-only peer" checked
                        wire:model.defer="ongoing">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('Ongoing')); ?></span>
                </label>
                <div>
                    
                    <button x-bind:disabled="<?php echo e($isEdit ? 'false' : 'true'); ?>" type="button" wire:click='update' wire:loading.attr="disabled"
                        class="<?php echo e(!$isEdit ? 'bg-gray-500 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-800'); ?> text-black rounded-md px-4 py-2">
                        <?php echo e(__('Save drop')); ?>

                    </button>
                    
                    <button x-bind:disabled="<?php echo e($isEdit ? 'true' : 'false'); ?>" type="submit" wire:loading.attr="disabled"
                        class="<?php echo e($isEdit ? 'bg-gray-500 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-800'); ?> text-black rounded-md px-4 py-2">
                        <?php echo e(__('New drop')); ?>

                    </button>
                   
                </div>
                <p class='text-red-700 font-extrabold text-2xl justify-items-center' x-show='!isDisabled'><?php echo e(__('Remember to save')); ?></p>
            </form>
        </div>
    </div>

    <div class="w-3/2 mx-auto mt-8 flex flex-wrap justify-center">
        <?php $__currentLoopData = $drops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$drop->ongoing): ?>
                <div class="bg-white w-1/4 p-4 m-2 rounded-md shadow">
            <?php else: ?>
                <div class="bg-green-500 w-1/4 p-4 m-2 rounded-md shadow">
            <?php endif; ?>

            <h3 class="text-xl font-bold mb-2"><?php echo e($drop->title); ?> id: <?php echo e($drop->id); ?></h3>
            <p><?php echo e($drop->description); ?></p>
            <p class="text-gray-500">Start Date: <?php echo e(date('Y-m-d', strtotime($drop->date_start))); ?></p>
            <p class="text-gray-500">End Date: <?php echo e(date('Y-m-d', strtotime($drop->date_end))); ?></p>

            <?php if($drop->ongoing): ?>
                <p class="text-gray-500">Ongoing: Yes</p>
            <?php else: ?>
                <p class="text-gray-500">Ongoing: No</p>
            <?php endif; ?>

            <div class="mt-4">
                
                <button type="button" wire:click="edit(<?php echo e($drop->id); ?>)"
                    class="ml-2 w-12/12 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 
                    font-medium rounded-lg text-xs px-3 py-2 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                    <?php echo e(__('Edit')); ?>

                </button>


                <button type="button" wire:click="delete(<?php echo e($drop->id); ?>)"
                    class="ml-2 w-12/12 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-2 focus:ring-red-300 
                    font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    <?php echo e(__('Delete')); ?>  
                </button>

                    
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php if(session()->has('message')): ?>
    <div class="fixed bottom-0 right-0 mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/drop-handling.blade.php ENDPATH**/ ?>