<?php


use App\Http\Controllers\FileController;
use App\Http\Controllers\OpenController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\RolesController;
use App\Http\Livewire\Biographies\Biographies;
use App\Http\Livewire\Biographies\Chapters\ChapterEdit;
use App\Http\Livewire\Categories\Categories;
use App\Http\Livewire\Categories\Categoryposts;
use App\Http\Livewire\Collections\Collections;
use App\Http\Livewire\Collections\CollectionutilityEdit;
use App\Http\Livewire\Collections\CollectionutilityEditFiles;
use App\Http\Livewire\Collections\CollectionutilityShow;
use App\Http\Livewire\Collections\CollectionUtilityUpdate;
use App\Http\Livewire\Collections\CollectionWallet;
use App\Http\Livewire\Collections\CollectionWalletShow;

use App\Http\Livewire\Collections\CollectionWalletUpdate;
use App\Http\Livewire\Collections\Items;
use App\Http\Livewire\Collections\ItemZoom;
use App\Http\Livewire\Collections\Preview;
use App\Http\Livewire\Collections\ItemsEdit;
use App\Http\Livewire\DropCollection;
use App\Http\Livewire\ItemUtility;
use App\Http\Livewire\ItemutilityEdit;
use App\Http\Livewire\ItemutilityFilesEdit;
use App\Http\Livewire\ItemutilityShow;
use App\Http\Livewire\ItemutilityUpdate;
use App\Http\Livewire\Posts\Posts;
use App\Http\Livewire\Posts\Post as p;
use App\Http\Livewire\Tags\Tagposts;
use App\Http\Livewire\Tags\Tags;
use App\Http\Livewire\TeamItemUtility;
use App\Http\Livewire\Test;
use App\Http\Livewire\TinymceIntegrationComponent;
use App\Http\Livewire\Traits;
use App\Models\Collection_utility_files;
use App\Models\Item_utility;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DropCrud;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('test', function () {
//     $category = App\Models\Category::find(3);
//     // return $category->posts;

//     $comment = App\Models\Comment::find(152);
//     // return $comment->author;
//     // return $comment->post;

//     $post = App\Models\Post::find(152);
//     // return $post->category;
//     // return $post->author;
//     // return $post->images;
//     // return $post->comments;
//     // return $post->tags;

//     $tag = App\Models\Tag::find(5);
//     // return $tag->posts;

//     $author = App\Models\User::find(88);
//     // return $author->posts;
//     return $author->comments;
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/policyprivacy', function () {
    return view('policy');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->get('dashboard/drops', DropCrud::class)->name('drops');

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->get('dashboard/dropcollection/{id}', DropCollection::class)->name('dropCollection');

Route::post('/save-file', [FileController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/phpini', [QrController::class, 'index'])->name('phpini');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collections', Collections::class)->name('collections');

Route::middleware(['auth:sanctum', 'verified'])->get('user/profile/biographies', Biographies::class)->name('biographies');

Route::middleware(['auth:sanctum', 'verified'])->get('user/profile/biographies/chapter/{id}', ChapterEdit::class)->name('chapters');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/wallet/update', CollectionWalletUpdate::class)->name('collectionsWalletUpdate');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/preview', Preview::class)->name('preview');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/item_upload', Items::class)->name('upload');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/item/utility/{id}', TeamItemUtility::class)->name('ItemUtility');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/utilities/update', CollectionUtilityUpdate::class)->name('CollectionutilityUpdate');

Route::middleware(['auth:sanctum', 'verified'])->get("dashboard/collection/item_upload/head", [OpenController::class, 'collection_head']);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/item_upload/asset', [OpenController::class, 'collection_asset']);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/items_edit/{id}', ItemsEdit::class);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/items_zoom/{id}', ItemZoom::class);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/items_edit/{id}/traits', Traits::class)->name('traits');

Route::middleware(['auth:sanctum', 'verified', 'usertype.isadmin'])->resource('dashboard/authorizations', RolesController::class);

Route::middleware(['auth:sanctum', 'verified', 'usertype.isadmin'])->post('authorizations/store', RolesController::class . '@store')->name('save');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/{id}/items', Items::class)->name('items');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/categories', Categories::class)->name('categories');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/categories/{id}/posts', Categoryposts::class);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/posts', Posts::class)->name('posts');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/posts/{id}', p::class);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/tags', Tags::class)->name('tags');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/tags/{id}/posts', Tagposts::class);




//Route::get('dashboard/categories', Categories::class)->name('categories');
//Route::get('dashboard/categories/{id}/posts', Categoryposts::class);
//Route::get('dashboard/posts', Posts::class)->name('posts');
//Route::get('dashboard/posts/{id}', p::class);
//Route::get('dashboard/tags', Tags::class)->name('tags');
//Route::get('dashboard/tags/{id}/posts', Tagposts::class);
