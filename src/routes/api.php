<?php

declare(strict_types=1);

use App\Http\Controllers\TimeCardController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\userController;
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

Route::get('/user_list', [userController::class, 'userList']);
Route::post('/timecard/register',[ProjectUserController::class, 'createOrUpdateTimecard']);
Route::get('/timecard/{project_user_id}', [TimeCardController::class, 'getTimeCard']); //   クエリパラメーターでyear_monthを送る
