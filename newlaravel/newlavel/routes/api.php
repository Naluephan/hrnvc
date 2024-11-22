<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware'=>['api','auth:sanctum']],function () {
    Route::post('userById',[\App\Http\Controllers\APIs\UserController::class,'userById'])->name('user.by.id');
    Route::post('userWithDatatable',[\App\Http\Controllers\APIs\UserController::class,'userWithDatatable'])->name('user.with.datatable');
});
Route::put('/users/update',[\App\Http\Controllers\APIs\UserController::class,'updateApi'])->name('user.update');
Route::put('/users/delete',[\App\Http\Controllers\APIs\UserController::class,'deleteApi'])->name('user.delete');
