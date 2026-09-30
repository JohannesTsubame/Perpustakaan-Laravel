<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Capi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('buku1', [Capi::class, 'buku1']);
Route::get('buku2', [Capi::class, 'buku2']);
Route::get('buku3', [Capi::class, 'buku3']);
Route::get('buku4', [Capi::class, 'buku4']);
Route::get('buku5', [Capi::class, 'buku5']);
Route::get('buku_by_id/{id}', [Capi::class, 'buku_by_id']);