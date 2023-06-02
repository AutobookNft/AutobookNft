<?php
    $epp_id=$item->epp_id ? $item->epp_id : 0;
?>


<div class="flex ml-2 rounded-xl">

    <form method="POST" action="<?php echo e(route('current-team.update')); ?>" id="form-id" x-data>
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>

        <!-- Hidden Team ID -->
        <input type="hidden" name="team_id" value="<?php echo e($item['id']); ?>">

        <div class = 'grid grid-cols-2 rounded-2xl'>

            <div class='grid grid-cols-1 grid-flow-row rounded-2xl'>

                
                <div class="col-span-1">
                    <a href='#'  x-on:click.prevent="$root.submit();">
                        <?php if($item['path_image_econft']==''): ?>
                            <img class="p-1 mt-2 max-h-32 rounded-2xl" src='/storage/images/default/logo_t.png'>
                        <?php else: ?>
                            <img class="p-1 mt-2 max-h-32 rounded-2xl" src=<?php echo e($item['path_image_econft']); ?> alt="product image"
                            title="<?php echo e($item['path_image_econft']); ?>" />
                        <?php endif; ?>
                    </a>

                    
                    <p class="pl-2 mt-3 text-md text-gray-100 font-normal"> <?php echo e($item['name']); ?>

                        <img src='/storage/images/default/logo_t.png' class="w-10 h-10 inline">
                    </p>
                </div>

                
                <?php if($epp_id<>0): ?>
                    <?php
                        $epp_user = App\Models\User::find($epp_id);
                    ?>
                    <div class='col-span-1'>
                        <div class ="inline">
                            <span class="ml-1 material-icons text-yellow-400 text-sm">
                                wb_sunny
                            </span>
                        </div>
                        <div class="ml-1 mt-1 absolute inline text-sm font-font-extralight tracking-tight text-green-400">
                            <?php echo e("EPP: $epp_user->org_name"); ?>

                        </div>
                    </div>
                <?php endif; ?>

                
                <?php ($qta_item=count(App\Models\Teams_item::where('team_id',$item['id'])->get())); ?>
                <?php if($qta_item>0): ?>
                    <?php if(Auth::user()->usertype != 'epp'): ?>
                        <div class='col-span-1'>
                            <div class="inline pl-2 mt-3 text-md text-gray-100 font-normal">
                                <?php echo e('Items n.:'); ?> 
                            </div>
                            <div class="ml-1 mt-1 inline text-sm font-font-extralight tracking-tight text-green-400">
                                <?php echo e($qta_item); ?>

                            </div>    
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

               
                <div class='col-span-1'>
                    <div class="inline pl-2 mt-3 text-md text-gray-100 font-normal">
                        <?php echo e('ID team:'); ?> 
                    </div>
                    <div class="ml-1 mt-1 inline text-sm font-font-extralight tracking-tight text-green-400">
                        <?php echo e($item['id']); ?>

                    </div>    
                </div>
        
            </div>



            <div class=' mt-4 grid grid-cols-1 grid-flow-row rounded-2xl'>
                <?php ($wallets=App\Models\Team_wallet::where('team_id',$item['id'])->get()); ?>
                <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="block pl-2 text-xs font-font-extralight tracking-tight text-gray-100 "><?php echo e(Str::limit($wallet->address, 15, '...')); ?> </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

        

        

    </form>

</div>

<?php /**PATH /var/www/2023_04_01/natan_blog/resources/views/components/collection-item-collections.blade.php ENDPATH**/ ?>