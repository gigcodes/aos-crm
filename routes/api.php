<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user',function (){
        $user = User::factory()->make();
        return response()->json($user);
    });
});
