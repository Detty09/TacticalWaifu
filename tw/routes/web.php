<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\DereController;
use App\Http\Controllers\ProfileController;
use App\Models\DereType;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/deretypes', [DereController::class, 'getDereTypes'])
    ->name('deretypes');


Route::get('/new', [CharacterController::class, 'create'])
    ->name('character.new');

Route::post('/character', [CharacterController::class, 'store'])
    ->name('character.store');


Route::post('/character/find', [CharacterController::class, 'find'])
    ->name('character.find');


Route::get('/character/{uuid}/pdf', [CharacterController::class, 'pdf'])
    ->name('character.pdf');

Route::get('/character/{uuid}/pdf/download', [CharacterController::class, 'pdfDownload'])
    ->name('character.pdf.download');


Route::get('/character/{uuid}', [CharacterController::class, 'show'])
    ->name('character.show');

