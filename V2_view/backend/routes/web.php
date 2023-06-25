<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::get('/announcements', [AnnouncementController::class, 'index'])
->name('announcement');
Route::post('/register', [AuthController::class, 'register'])
->name('register');
Route::post('/login', [AuthController::class, 'login'])
->name('login');
Route::post('/logout', [AuthController::class, 'logout'])
->name('logout');
Route::get('/announcements/immobilier', [AnnouncementController::class, 'index_one'])
    ->name('immobilier_announcements');
Route::get('/announcements/multimedia', [AnnouncementController::class, 'index_two'])
    ->name('multimedia_announcements');
Route::get('/announcements/maison', [AnnouncementController::class, 'index_tree'])
    ->name('maison_announcements');
Route::get('/announcements/vehicules', [AnnouncementController::class, 'index_four'])
    ->name('vehicules_announcements');
Route::get('/announcements/emploi', [AnnouncementController::class, 'index_five'])
    ->name('emploi_announcements');
Route::get('/announcements/objects', [AnnouncementController::class, 'index_six'])
    ->name('objects_announcements');

Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('show_users');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.destroy');

    Route::get('/announcements/delete', [AnnouncementController::class, 'destroyPage'])
        ->name('delete_announcements_page');
    Route::get('/announcement/validate', [AnnouncementController::class, 'validateAnnouncementPage'])
        ->name('validate_announcement_page');
    Route::put('/announcement/{id}/validate', [AnnouncementController::class, 'validateAnnouncement'])
        ->name('validate_announcement');
    Route::delete('/announcements/{id}', [AnnouncementController::class, 'destroy'])
        ->name('delete_announcements');

    Route::get('/city', [CityController::class, 'index'])
        ->name('show_city');
    Route::post('/city', [CityController::class, 'store'])
        ->name('store_city');
    Route::put('/city/{id}', [CityController::class, 'update'])
        ->name('update_city');
    Route::get('/city/{id}/edit', [CityController::class, 'edit'])
        ->name('edit_city');
    Route::get('/city/create', [CityController::class, 'create'])
        ->name('create_city');
    Route::delete('/city/{id}', [CityController::class, 'destroy'])
        ->name('delete_city');

    Route::get('/category', [CategoryController::class, 'index'])
        ->name('show_category');
    Route::post('/category', [CategoryController::class, 'store'])
        ->name('store_category');
    Route::put('/category/{id}', [CategoryController::class, 'update'])
        ->name('update_category');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])
        ->name('edit_category');
    Route::get('/category/create', [CategoryController::class, 'create'])
        ->name('create_category');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])
        ->name('delete_category');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/announcements', [AnnouncementController::class, 'store'])
        ->name('store_announcement');
        Route::put('/announcements/{id}', [AnnouncementController::class, 'update'])
            ->name('update_announcement');
    Route::get('/announcements/create', [AnnouncementController::class, 'create'])
        ->name('create_announcement');
    Route::get('/announcements/{id}/edit', [AnnouncementController::class, 'edit'])
        ->name('edit_announcements');
    Route::get('/announcements/myannouncement', [AnnouncementController::class, 'my_announcement'])
        ->name('my_announcement');
});
