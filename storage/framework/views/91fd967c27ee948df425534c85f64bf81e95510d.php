 <!-- Type -->
<div class="col-span-6 sm:col-span-4">
    <label for="doc_typo"
        class="block text-gray-700 text-sm font-bold mb-2"><?php echo e(__('Doc type')); ?>:
    </label>
        
    <ul 
        class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center pl-3">
                <input name ='doctype' id="drive-checkbox-list" value='drivel' type="radio" wire:model.defer="state.doc_typo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="drive-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('Drive licence')); ?></label>
            </div>
        </li>
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center pl-3">
                <input name ='doctype' id="passport-checkbox-list" value='passport' type="radio" wire:model.defer="state.doc_typo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="passport-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('Passport')); ?></label>
            </div>
        </li>
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center pl-3">
                <input name ='doctype' id="idc-checkbox-list" value='idcard' type="radio" wire:model.defer="state.doc_typo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="idc-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('Identity card')); ?></label>
            </div>
        </li>
        
    </ul>


</div>
<?php /**PATH /var/www/natan_blog/resources/views/profile/checkbox-doc-type.blade.php ENDPATH**/ ?>