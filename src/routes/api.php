<?php

declare(strict_types=1);

use App\Http\Controllers\BillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\TimeCardController;
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

Route::get('/user_data/{id}', [userController::class, 'getUserData']);
Route::post('/setting/backlog',[userController::class, 'settingBacklog']);

Route::get('/timecard/{project_id}', [TimeCardController::class, 'getTimeCard']);

//ユーザー プロジェクト一覧を表示
Route::get('/user_project_list/{user_id}', [ProjectUserController::class, 'getUserProject']);
//チケットAPI 参加プロジェクト選択
Route::post('/update_join_project', [ProjectUserController::class, 'updateJoinProject']);
//オーナー メンバー管理画面取得
Route::get('/owner/get_member_management/{project_id}', [ProjectUserController::class, 'getOwnerMemberManagement']);
//オーナー メンバー管理画面 編集
Route::post('/owner/update_member_management', [ProjectUserController::class, 'updateOwnerMemberManagement']);
//オーナー メンバー管理画面詳細 表示
Route::get('/owner/detail_member_management/{project_user_id}', [ProjectUserController::class, 'getDetailOwnerMemberManagement']);


//オーナー プロジェクト一覧画面
Route::get('/owner/get_project_list/{owner_id}', [ProjectController::class, 'getOwnerProject']);
//オーナー プロジェクト作成
Route::post('/owner/create_project', [ProjectController::class, 'createOwnerProject']);
//オーナープロジェクト編集
Route::post('/owner/update_project', [ProjectController::class, 'updateOwnerProject']);

Route::post('/get_bill_pdf', [BillController::class, 'getBillPdf']);
