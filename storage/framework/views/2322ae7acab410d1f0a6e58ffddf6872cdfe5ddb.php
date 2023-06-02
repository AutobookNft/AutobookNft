<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.collections.layout-item','data' => ['team' => $team,'items' => $items,'description' => $item['description'],'datecreation' => $item['creation_date'],'webp' => $item['webp'],'extention' => $item['extention'],'thumbnails' => $item['thumbnail'],'title' => $item['title'],'itemId' => $item['id'],'show' => $item['show'],'paired' => ''.e($paired).'','fileCover' => ''.e($fileCover).'','filename' => ''.e($filename).'','price' => ''.e($item['price']).'','hasHfile' => ''.e($item['hash_file']).'','imagetitle' => ''.e($imagetitle).'','editShow' => 'edit','dontShow' => ''.e($dontShow).'','saved' => ''.e($saved).'','cardType' => $cardType,'itemType' => ''.e($teamItem->type).'','collectionname' => $collectionname]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('collections.layout-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['team' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($team),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['description']),'datecreation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['creation_date']),'webp' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['webp']),'extention' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['extention']),'thumbnails' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['thumbnail']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['title']),'itemId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['id']),'show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['show']),'paired' => ''.e($paired).'','fileCover' => ''.e($fileCover).'','filename' => ''.e($filename).'','price' => ''.e($item['price']).'','hasHfile' => ''.e($item['hash_file']).'','imagetitle' => ''.e($imagetitle).'','editShow' => 'edit','dontShow' => ''.e($dontShow).'','saved' => ''.e($saved).'','cardType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cardType),'itemType' => ''.e($teamItem->type).'','collectionname' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($collectionname)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>





<?php /**PATH /var/www/natan_blog/resources/views/livewire/item-image.blade.php ENDPATH**/ ?>