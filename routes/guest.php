<?php

use App\Http\Livewire\Dropzonetest\DropZoneTest;


Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/dropzonetest', DropZoneTest::class)->name('dropzonetest');
