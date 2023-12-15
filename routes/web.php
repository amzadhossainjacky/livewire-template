<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Backend\Auth\LogoutPage;
use App\Livewire\Backend\Role\RoleEditPage;
use App\Livewire\Backend\Role\RoleListPage;
use App\Livewire\Backend\Users\UserEditPage;
use App\Livewire\Backend\Users\UserListPage;
use App\Livewire\Backend\Role\RoleCreatePage;
use App\Livewire\Backend\Tests\ProtectedPage;
use App\Livewire\Backend\Users\UserCreatePage;
use App\Livewire\Frontend\Auth\LoginComponent;
use App\Livewire\Backend\Settings\SettingsPage;
use App\Livewire\Backend\Dashboard\DashboardPage;
use App\Livewire\Backend\Errors\FourZeroFourPage;
use App\Livewire\Backend\Profile\ProfileShowPage;
use App\Livewire\Backend\Errors\FourZeroThreePage;
use App\Livewire\Backend\Permissions\PermissionListPage;
use App\Livewire\Backend\Settings\General\GeneralSettingsPage;

Route::get('login', LoginComponent::class)->name('login');
Route::redirect('/', 'login');

/** Admin Routes */
Route::middleware(['auth'])->prefix('admin')->name("admin.")->group(function () {

   
    Route::get('/', DashboardPage::class)->name('dashboard');


    ## Role
    Route::get('/roles', RoleListPage::class)->name('roles')->middleware(['permission:role-list']);
    Route::get('/roles/create', RoleCreatePage::class)->name('roles.create')->middleware(['permission:role-create']);
    Route::get('/roles/edit/{id}/', RoleEditPage::class)->name('roles.edit')->middleware(['permission:role-edit']);

    ## Permission
    Route::get('/permissions', PermissionListPage::class)->name('permissions')->middleware(['permission:permission-list']);

    ## User
    Route::get('/users', UserListPage::class)->name('users')->middleware(['permission:user-list']);
    Route::get('/users/create', UserCreatePage::class)->name('users.create')->middleware(['permission:user-create']);
    Route::get('/users/edit/{id}', UserEditPage::class)->name('users.edit')->middleware(['permission:user-edit|user-delete']);


    ## Settings
    Route::get('/settings', SettingsPage::class)->name('settings')->middleware(['permission:setting-list']);
    Route::get('/settings/general', GeneralSettingsPage::class)->name('settings.general');

    ## Logout
    Route::get('/logout', LogoutPage::class)->name('logout');

    ## Errors
    Route::get('/404', FourZeroFourPage::class)->name('four_zero_four');
    Route::get('/403', FourZeroThreePage::class)->name('four_zero_three');

    ## System Test
    Route::get('protected', ProtectedPage::class)->name('protected_page');

    ## User profile
    Route::get('/profile', ProfileShowPage::class)->name('profile.show');

   
});

/** Marketing Routes */
Route::middleware(['auth'])->prefix('marketing')->name("marketing.")->group(function () {


});

// /** CC Routes */
Route::middleware(['auth'])->prefix('call-center')->name("call-center.")->group(function () {

});
