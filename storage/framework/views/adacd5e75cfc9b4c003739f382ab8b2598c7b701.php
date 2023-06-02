<div x-data="{ value: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?> }" x-init="tinymce.init({
    target: $refs.tinymce,
    themes: 'modern',
    resize: true,
    menubar: false,
    plugins: [
        'autoresize advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | preview | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    setup: function(editor) {
        editor.on('blur', function(e) {
            value = editor.getContent()
        })

        editor.on('init', function(e) {
            if (value != null) {
                editor.setContent(value)
            }
        })

        function putCursorToEnd() {
            editor.selection.select(editor.getBody(), true);
            editor.selection.collapse(false);
        }

        $watch('value', function(newValue) {
            if (newValue !== editor.getContent()) {
                editor.resetContent(newValue || '');
                putCursorToEnd();
            }
        });

        editor.on('keyup', function() {
            document.getElementById('save').disabled=false;

            handleButtonStateChange();
        });

    }
})" wire:ignore>
    <div>
        <input x-ref="tinymce" type="textarea" <?php echo e($attributes->whereDoesntStartWith('wire:model')); ?>>
    </div>
</div>


<?php /**PATH /var/www/natan_blog/resources/views/components/input-tinymce.blade.php ENDPATH**/ ?>