<div class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md
transition duration-150 ease-in-out">

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.dropdown','data' => ['align' => 'left','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'left','width' => '48']); ?>
     <?php $__env->slot('trigger', null, []); ?> 
        <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">

            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>

            <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd"></path>
        </svg>
        <a><?php echo e('Intarnal tranfer'); ?></a>

     <?php $__env->endSlot(); ?>

     <?php $__env->slot('content', null, []); ?> 
        <!-- Account Management -->
        

        <?php $__currentLoopData = Auth::user()->allTeams(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginalb68ae16bf98b17105c92cdd80195bd06986714f2 = $component; } ?>
<?php $component = App\View\Components\ItemInternalTranfer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('item-internal-tranfer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ItemInternalTranfer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['team' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($team)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb68ae16bf98b17105c92cdd80195bd06986714f2)): ?>
<?php $component = $__componentOriginalb68ae16bf98b17105c92cdd80195bd06986714f2; ?>
<?php unset($__componentOriginalb68ae16bf98b17105c92cdd80195bd06986714f2); ?>
<?php endif; ?>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="border-t border-gray-100"></div>

     <?php $__env->endSlot(); ?>

   <!-- Remove Team Member Confirmation Modal -->

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/menudrop-list-teams.blade.php ENDPATH**/ ?>