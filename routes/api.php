<?php

use App\Http\Controllers\ProjectDestroyController;
use App\Http\Controllers\ProjectIndexController;
use App\Http\Controllers\ProjectShowController;
use App\Http\Controllers\ProjectStoreController;
use App\Http\Controllers\ProjectUpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', ProjectIndexController::class)->name('project.index');
Route::post('/projects', ProjectStoreController::class)->name('project.store');
Route::get('/projects/{project}', ProjectShowController::class)->name('project.show');
Route::patch('/projects/{project}', ProjectUpdateController::class)->name('project.update');
Route::delete('/projects/{project}', ProjectDestroyController::class)->name('project.destroy');
