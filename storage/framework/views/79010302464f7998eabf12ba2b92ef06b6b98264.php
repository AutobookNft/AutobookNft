<form wire:click="edit" id='form-id' wire:submit.prevent="edit" x-data="{ isDisabled: true }"> <?php echo csrf_field(); ?>

    <?php if($itemType=='audio' && $cardType !='show' && $paired==false): ?>
        <?php echo $__env->make('livewire.collections.item-include.cover-select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if($itemType=='audio' && $cardType !='show' && $paired==true): ?>
        <?php echo $__env->make('livewire.collections.item-include.cover-unbind', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div :class= "{'bg-gray-600':!isDiabled}">

    <div class="grid grid-cols-1 m-1">
        <div class="col-span-12">
            <label for="title" class='text-white'> <?php echo e(__('Collection')); ?>

                <input type="text" id="collection" class="<?php echo e($class_input); ?> opacity-50" Value="<?php echo e($collectionname); ?>" disabled>
            </label>

        </div>
    </div>

    <div class="grid grid-cols-1 m-1">
        <div class="col-span-12">
            <label for="title" class='text-white'> <?php echo e(__('Title')); ?> <span class = "text-xs"> <?php echo e(('(max 25 chars)')); ?> </span>
                <input @keydown="isDisabled = false" maxlength ="25" type="text" id="title" wire:model.defer="state.title"
                    :disabled="!Gate::check('update', $team)" class="<?php echo e($class_input); ?>">
            </label>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.input-error','data' => ['for' => 'title','class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'title','class' => 'mt-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>

    <?php if(Auth::user()->usertype!='epp'): ?>
        <div class="grid grid-cols-1 m-1">
            <div class="col-span-12">
                <label for="price" class='text-white'> <?php echo e(__('Floor price')); ?> <span class='text-xs'> <?php echo e(__('(ALGO)')); ?></span>
                    <input @keydown="isDisabled = false" type="text" id="price" wire:model.defer="state.price"
                        :disabled="!Gate::check('update', $team)" class="<?php echo e($class_input); ?>">
                </label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.input-error','data' => ['for' => 'price','class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'price','class' => 'mt-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 m-2">
        <label for="description" class="block text-white text-lg mb-2"><?php echo e(__('Description')); ?>: <span class='text-xs'> <?php echo e(__('(max 2000 chars)')); ?></span></label>

        <textarea @keydown="isDisabled = false" rows="5" cols="40" maxlength ="2000"
            class="shadow appearance-none border rounded text-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
            id="description" wire:model.defer="state.description" :disabled="!Gate::check('update', $team)"
            placeholder="<?php echo e(__('Enter description')); ?>">

        </textarea>
        <?php $__errorArgs = ['description'];
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

    <div class="grid grid-cols-1 m-2">
        <label for="creation_date" class="block text-white text-lg mb-2"><?php echo e(__('Creation date')); ?>:</label>
        <input @keydown="isDisabled = false" type="date"
            class="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="creation_date" wire:model.defer="state.creation_date" :disabled="!Gate::check('update', $team)">
        <?php $__errorArgs = ['creation_date'];
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

    <div class="grid grid-cols-1 rows-2 m-2">

        <label class="relative inline-flex items-center cursor-pointer">
            <input @change="isDisabled = false" type="checkbox" id="show" name="show" class="sr-only peer" checked
                wire:model.defer="state.show">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
            </div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('Publish')); ?></span>
        </label>

        <label class="relative inline-flex items-center cursor-pointer">
            <input @keydown="isDisabled=false" type="text" id="position" wire:model.defer="state.position"
                :disabled="!Gate::check('update', $team)" class="rounded-lg bg-gray-200 h-6 p-2 mt-2 text-sm w-1/5">
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('Position')); ?></span>
        </label>
        <p class='text-red-700 font-extrabold text-2xl justify-items-center' x-show='!isDisabled'><?php echo e(__('Remember to save')); ?></p>
    </div>

    
        <div class='grid grid-cols-3 justify-end'>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.action-message','data' => ['class' => 'mr-3','on' => 'saved']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-action-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3','on' => 'saved']); ?>
                <label class='text-green-800 font-bold text-xl'> <?php echo e(__('Saved!')); ?> </label>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>''

            <button x-bind:disabled="isDisabled" type="submit" wire:loading.attr="disabled" @click="isDisabled=true"
                :class="{'hover:bg-green-800 dark:hover:bg-green-700 bg-green-700 dark:bg-green-600':! isDisabled, 'bg-gray-500 dark:bg-gray-500': isDisabled }"
                class="mt-2 w-12/12 col-start-2 focus:outline-none text-white  focus:ring-4 focus:ring-green-300
                font-medium rounded-lg text-xs px-5 py-2   dark:focus:ring-green-800">
                <?php echo e(__('Save')); ?>

            </button>

            <button type="button" wire:click="confirmItemRemoved(<?php echo e($itemId); ?>)"
                class="mt-2 ml-2 w-12/12 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                <?php echo e(__('Delete')); ?>

            </button>
        </div>
    
    </div>

</form>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.confirmation-modal','data' => ['wire:model' => 'confirmItemRemoval']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'confirmItemRemoval']); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e(__('Remove item')); ?>

     <?php $__env->endSlot(); ?>

     <?php $__env->slot('message', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.action-message','data' => ['class' => 'mr-3','on' => 'errore']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-action-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3','on' => 'errore']); ?>
            <label class='text-red-800 font-bold text-xl'> <?php echo e(__('This item cannot be deleted because there are any files associated with it')); ?> </label>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('content', null, []); ?> 
        <?php echo e(__('Are you sure you would like to remove this item?')); ?>

     <?php $__env->endSlot(); ?>

     <?php $__env->slot('footer', null, []); ?> 

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.secondary-button','data' => ['wire:click' => '$toggle(\'confirmItemRemoval\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'confirmItemRemoval\')','wire:loading.attr' => 'disabled']); ?>
            <?php echo e(__('Cancel')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.danger-button','data' => ['class' => 'ml-3','wire:click' => 'delete','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'delete','wire:loading.attr' => 'disabled']); ?>
            <?php echo e(__('Remove')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>



<script>

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#form-id');
        form.addEventListener('saved', () => {
            form.classList.add('animate-bg-saved');
            setTimeout(() => {
                form.classList.remove('animate-bg-saved');
            }, 1000);
        });
    });

</script>


<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/form.blade.php ENDPATH**/ ?>