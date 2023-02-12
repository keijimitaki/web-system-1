<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;

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

Route::get('/', [TopicController::class, 'index']);
Route::get('/topics', [TopicController::class, 'index'])->name("topics.index");

// Route::resource('topics', TopicController::class)
//     ->only(['index', 'store', 'update', 'destroy']);

Route::post('/topics/', [TopicController::class, 'store'])->name("topics.store");
Route::post('/topics/{topic}', [TopicController::class, 'update'])->name("topics.update");
Route::delete('/topics/{topic}', [TopicController::class, 'delete'])->name("topics.delete");


