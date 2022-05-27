<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;

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

// 게시물 리스트 페이지
Route::get('/', [BoardController::class, 'index']);

// 게시물 디테일 페이지
Route::get('/show/{id}', [BoardController::class, 'show']);

// 게시물 작성
Route::get('/create', [BoardController::class, 'create']);
Route::post('/create/store', [BoardController::class, 'store']);

// 게시물 수정
Route::get('/edit/{id}', [BoardController::class, 'edit']);
Route::post('/update', [BoardController::class, 'update']);

// 게시물 삭제
Route::delete('/delete/{id}', [BoardController::class, 'delete']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
