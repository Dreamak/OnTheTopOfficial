<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\OnTheTopController;
use App\Http\Controllers\GuildWarController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['checkrole:admin,OnTheTop'])->group(function () {

        Route::get('/onthetop', [OnTheTopController::class, 'dashboard'])->name('onthetop.dashboard');
        Route::get('/onthetop/dashboard', [OnTheTopController::class, 'dashboard'])->name('onthetop.dashboard');
        Route::get('/guildwars', [GuildWarController::class, 'showCurrentWar'])->name('guildwars.current');


    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::patch('/admin/guilds/{guild}', [AdminController::class, 'updateGuild'])->name('guild.update');
        Route::patch('/admin/members/{member}', [AdminController::class, 'updateMember'])->name('member.update');
        Route::post('/admin/guilds', [AdminController::class, 'storeGuild'])->name('guild.store');
        Route::post('/admin/members', [AdminController::class, 'storeMember'])->name('member.store');

        Route::get('/admin/guilds/{guild}/manage', [AdminController::class, 'manageGuildMembers'])->name('admin.guild.manage');
        Route::patch('/members/{member}', [MemberController::class, 'update'])->name('members.update');
        Route::post('/members', [MemberController::class, 'addMemberToGuild'])->name('members.store');
        Route::post('/admin/guilds/{guild}/manage', [MemberController::class, 'addMemberToGuild'])->name('guilds.add-member');
        Route::patch('/admin/members/{member}/remove-from-guild', [MemberController::class, 'removeFromGuild'])->name('members.remove-from-guild');

        Route::resource('admin/users', UserController::class)->middleware('auth', 'role:admin');
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

        Route::get('/admin/guildwars', [GuildWarController::class, 'index'])->name('admin.guildwars.index');
        Route::get('/admin/guildwars/create', [GuildWarController::class, 'create'])->name('admin.guildwars.create');
        Route::post('/admin/guildwars', [GuildWarController::class, 'store'])->name('admin.guildwars.store');
        Route::get('/admin/guildwars/{id}/edit', [GuildWarController::class, 'edit'])->name('admin.guildwars.edit');
        Route::post('/admin/guildwars/{id}', [GuildWarController::class, 'update'])->name('admin.guildwars.update');


        });
    });

});
