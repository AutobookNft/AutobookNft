<div x-data="{ value: @entangle($attributes->wire('model')) }" x-init="tinymce.init({
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
        <input x-ref="tinymce" type="textarea" {{ $attributes->whereDoesntStartWith('wire:model') }}>
    </div>
</div>

{{-- <div x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init=
    "tinymce.init({
        target: $refs.tinymce,
        themes: 'modern',
        plugins: ['preview', 'autoresize'],
        resize: true,
        menu: {
        file: { title: 'Preview', items: 'preview fullscreen' },
        edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
        format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
        },

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

            editor.on('keyup', function (e) {
            if ((e.keyCode >= 48 && e.keyCode <= 57) || // numeric keys
                (e.keyCode>= 65 && e.keyCode <= 90) || // uppercase letter keys
                (e.keyCode>= 97 && e.keyCode <= 122)) { // lowercase letter keys
                    document.getElementById('save').disabled=false;
                }

                handleButtonStateChange();
            });
        }
    })"

wire:ignore>
    <div>
        <input x-ref="tinymce" type="textarea" {{ $attributes->whereDoesntStartWith('wire:model') }}>
    </div>
</div> --}}
