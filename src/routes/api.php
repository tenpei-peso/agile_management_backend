<?php

declare(strict_types=1);

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\TimeCardController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\OwnerAuthController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//ユーザー認証
Route::group(['prefix' => 'user', 'middleware' => ['api', 'auth:user']], function () {
    Route::post('/register', [UserAuthController::class, 'userRegister'])->withoutMiddleware(['auth:user']);
    Route::post('/login', [UserAuthController::class, 'userLogin'])->withoutMiddleware(['auth:user']);
    Route::post('/logout', [UserAuthController::class, 'userLogout']);
    Route::post('/refresh', [UserAuthController::class, 'userRefresh']);
    Route::post('/profile', [UserAuthController::class, 'userProfile']);
});

//オーナー認証
Route::group(['prefix' => 'owner', 'middleware' => ['api', 'auth:owner']], function () {
    Route::post('/register', [OwnerAuthController::class, 'ownerRegister'])->withoutMiddleware(['auth:owner']);
    Route::post('/login', [OwnerAuthController::class, 'ownerLogin'])->withoutMiddleware(['auth:owner']);
    Route::post('/logout', [OwnerAuthController::class, 'ownerLogout']);
    Route::post('/refresh', [OwnerAuthController::class, 'ownerRefresh']);
    Route::post('/profile', [OwnerAuthController::class, 'ownerProfile']);
});

Route::get('/user_data/{id}', [userController::class, 'getUserData']);
Route::post('/setting/backlog',[userController::class, 'settingBacklog']);

Route::get('/timecard/{project_id}', [TimeCardController::class, 'getTimeCard']);

Route::get('/user_project_list/{user_id}', [ProjectUserController::class, 'getUserProject']);
Route::post('/update_join_project', [ProjectUserController::class, 'updateJoinProject']);

//オーナープロジェクト一覧画面
Route::get('/owner/get_project_list/{owner_id}', [ProjectController::class, 'getOwnerProject']);
//オーナープロジェクト作成
Route::post('/owner/create_project', [ProjectController::class, 'createOwnerProject']);

