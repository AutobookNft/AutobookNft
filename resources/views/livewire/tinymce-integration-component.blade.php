<div class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <!-- Heading -->
                <h2 class="fw-bold blue-heading">
                    TinyMCE Editor Integration Example
                </h2>
            </div>
        </div> <!-- / .row -->
    </div>

    <x-input-tinymce wire:model="editor" placeholder="Type anything you want..." />
</div>

{{-- @section('scripts')
    <script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection --}}

