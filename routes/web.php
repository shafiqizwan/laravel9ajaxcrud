<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'MemberController@index');
Route::get('/', [MemberController::class, 'index']); //must use correct syntax

Route::get('/show', [MemberController::class, 'getMember']);
Route::post('/save', [MemberController::class, 'save'])->name('member.save');
Route::post('/update', [MemberController::class, 'update'])->name('member.update');
