<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriLokerController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\KategoriForumController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\forumidcontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\frontController;
use App\Http\Controllers\KomentarController;
use App\Models\Forum;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [frontController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::middleware(['auth', 'role:moderator'])->get('/moderator/dashboard', function () {
    return view('moderator.dashboard');
});
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', function () {
    return view('user.dashboard');
});

Route::get('forum', [frontController::class, 'forum'])->name('forum');
Route::get('/forum/data', [ForumController::class, 'getData']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard.static');
    Route::resource('admin/kategori_loker', KategoriLokerController::class)->names('admin.kategori_loker');
    Route::get('admin/kategori_loker', [KategoriLokerController::class, 'index'])->name('admin.kategori_loker.index');
    Route::get('admin/kategori_loker/create', [KategoriLokerController::class, 'create'])->name('kategori_loker.create');
    Route::post('admin/kategori_loker', [KategoriLokerController::class, 'store'])->name('kategori_loker.store');
    Route::get('admin/kategori_loker/{kategori_loker}/edit', [KategoriLokerController::class, 'edit'])->name('kategori_loker.edit');
    Route::put('admin/kategori_loker/{kategori_loker}', [KategoriLokerController::class, 'update'])->name('kategori_loker.update');
    Route::delete('admin/kategori_loker/{kategori_loker}', [KategoriLokerController::class, 'destroy'])->name('kategori_loker.destroy');

    Route::resource('admin/loker', LokerController::class)->names('admin.loker');
    Route::get('admin/loker', [LokerController::class, 'index'])->name('loker.index');
    Route::get('admin/loker/create', [LokerController::class, 'create'])->name('loker.create');
    Route::post('admin/loker', [LokerController::class, 'store'])->name('loker.store');
    Route::get('admin/loker/{loker}/edit', [LokerController::class, 'edit'])->name('loker.edit');
    Route::put('admin/loker/{loker}', [LokerController::class, 'update'])->name('loker.update');
    Route::delete('admin/loker/{loker}', [LokerController::class, 'destroy'])->name('loker.destroy');

    Route::resource('admin/user', UserController::class)->names('admin.user');
    Route::delete('admin/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:moderator'])->group(function () {
    Route::get('moderator/dashboard', function () {
        return view('moderator.dashboard');
    })->name('moderator.dashboard');
    Route::get('moderator/dashboard', [ForumController::class, 'index2'])->name('moderator.dashboard');

    Route::resource('moderator/kategori_forum', KategoriForumController::class)->names('moderator.kategori_forum');
    Route::resource('moderator/forum', ForumController::class)->names('moderator.forum');
    Route::get('forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('forum', [ForumController::class, 'store'])->name('forum.store');
    
    Route::get('/forum/{id}/komentar', [KomentarController::class, 'index'])->name('komentar.index');
    Route::post('/forum/{id}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
    Route::delete('/komentar/{komentar}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
    Route::get('forum.detail/{id}', [frontController::class, 'forumdetail'])->name('forum.detail');
    Route::get('forum', [frontController::class, 'forum'])->name('forum');
    Route::get('forumid/{id}', [forumidcontroller::class, 'forumid'])->name('forumid');
    Route::delete('moderator/forum/{forum}', [ForumController::class, 'destroy'])->name('forum.destroy');

    Route::patch('moderator/forums/{id}/approve', [ForumController::class, 'approve'])->name('moderator.forum.approve');
    Route::delete('moderator/forums/{id}/reject', [ForumController::class, 'reject'])->name('moderator.forum.reject');

    Route::get('moderator/user', [UserController::class, 'indexModerator'])->name('moderator.user.index');
    Route::post('/user/{id}/ban', [UserController::class, 'ban'])->name('user.ban');
    Route::post('/user/{id}/unban', [UserController::class, 'unban'])->name('user.unban');
});

Route::middleware(['auth', 'role:user,moderator'])->group(function () {
    Route::get('forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}/komentar', [KomentarController::class, 'index'])->name('komentar.index');
    Route::post('/forum/{id}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
    Route::delete('/komentar/{komentar}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
    Route::get('forum', [frontController::class, 'forum'])->name('forum');
    Route::get('home', [ForumController::class, 'forum'])->name('home.forum');
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');
    Route::get('forumid/{id}', [forumidcontroller::class, 'forumid'])->name('forumid');
    Route::get('/forum/data', [ForumController::class, 'getData']);
});

Route::post('/notification/read/{id}', function ($id) {
    $notification = auth()->user()->unreadNotifications()->find($id);
    if ($notification) $notification->markAsRead();
    return back();
})->name('notification.read');

Route::get('/notification/mark-all-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('markAllAsRead');

