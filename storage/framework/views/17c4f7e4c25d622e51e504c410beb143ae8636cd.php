<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <br><br><br>

     <?php $__env->slot('header', null, []); ?> 
       <h2>
            <div class="mb-4 col-span-6 sm:col-span-4">
                <label for="email" class="block text-gray-700 text-xxl font-bold mb-2"><?php echo e(__('Assign role & permissions')); ?></label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
       </h2>
     <?php $__env->endSlot(); ?>

   <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <form method="POST" action="authorizations/update" class="">
                <?php echo csrf_field(); ?>

                <?php echo method_field('PUT'); ?>

                <div class = 'mt-5 md:mt-2 md:col-span-4'>

                    <div class="mb-4 col-span-4 sm:col-span-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Indirizzo email:</label>
                        <input type="email" id="email" name="email" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6 col-span-4 sm:col-span-4">
                        <label for="usertype" class="block text-gray-700 text-sm font-bold mb-2">Ruolo:</label>
                        <select id="usertype" name="usertype" required
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Superadmin">Superadmin</option>
                            <option value="admin">Admin</option>
                            <option value="creator">Creator</option>
                            <option value="epp">EPP</option>
                        </select>
                    </div>

                    <div class="mb-4 col-span-6 sm:col-span-4">
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <?php echo e(__('Assign the role')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /var/www/natan_blog/resources/views/authorizations.blade.php ENDPATH**/ ?>