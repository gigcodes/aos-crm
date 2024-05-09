<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/','/login');

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');

Route::webhooks('webhook-url');
