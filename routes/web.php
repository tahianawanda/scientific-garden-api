<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Scientific Garden API',
        'version' => app()->version(),
    ]);
});

require __DIR__.'/auth.php';
