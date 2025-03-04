<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShoppingListController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/list',[ShoppingListController::class,'index'])->name('apihome');
Route::post('/list/store', [ShoppingListController::class, 'store'])->name('apistore');
Route::get('/list/show/{id}',[ShoppingListController::class, 'show'])->name('apishow');
Route::put('/list/update/{id}', [ShoppingListController::class, 'update'])->name('apiupdate');
Route::delete('/list/delete/{id}',[ShoppingListController::class,'destroy'])->name('apidestroy');
Route::delete('/list/deleteAll',[ShoppingListController::class,'destroyAll'])->name('apidestroyAll');