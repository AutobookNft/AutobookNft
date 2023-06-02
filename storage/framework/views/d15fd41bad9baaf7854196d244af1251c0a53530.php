<?php if($itemType=='audio'): ?>
    <div class="rounded-md bg-gray-200">
        <audio controls class="w-full rounded-md bg-gray-200">
            <source src="<?php echo e(url($hasHfile)); ?>" type="audio/mpeg">
        </audio>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/item-include/media-controller.blade.php ENDPATH**/ ?>