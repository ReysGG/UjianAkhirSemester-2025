<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug-role', function () {
    $user = \App\Models\User::where('email', 'gudang-a@admin.com')->first();

    return [
        'id' => $user->id,
        'name' => $user->name,
        'roles' => $user->getRoleNames(),
        'guard_name' => $user->roles->pluck('guard_name'),
    ];
});
