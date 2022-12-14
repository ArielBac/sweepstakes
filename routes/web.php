<?php

use App\Http\Controllers\SweepstakesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('', SweepstakesController::class)
    ->middleware('auth')
    ->names('sweepstakes')
    ->parameters([
        '' => 'sweepstake'
    ]);

Route::get('{sweepstake}/register', [SweepstakesController::class, 'register'])->name('sweepstake.register');
Route::post('{sweepstake}/register', [SweepstakesController::class, 'storeParticipant'])->name('sweepstake.storeParticipant');
Route::get('{sweepstake}/draw', [SweepstakesController::class, 'draw'])->name('sweepstake.draw');
