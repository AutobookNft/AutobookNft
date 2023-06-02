<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.collections.layout-item','data' => ['thumbnails' => $item['description'],'title' => ''.e($item['title']).'','itemId' => ''.e($item['id']).'','imagefile' => ''.e($item['hash_file']).'','imagetitle' => ''.e($imagetitle).'','itemType' => $itemType,'fileCover' => ''.e($item['hash_file']).'','itemIdBeingRemoved' => $itemIdBeingRemoved,'cardType' => ''.e($cardType).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('collections.layout-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['thumbnails' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['description']),'title' => ''.e($item['title']).'','itemId' => ''.e($item['id']).'','imagefile' => ''.e($item['hash_file']).'','imagetitle' => ''.e($imagetitle).'','itemType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemType),'fileCover' => ''.e($item['hash_file']).'','itemIdBeingRemoved' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemIdBeingRemoved),'cardType' => ''.e($cardType).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


  

<?php /**PATH /var/www/natan_blog/resources/views/livewire/item-file.blade.php ENDPATH**/ ?>