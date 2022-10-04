<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class userController extends Controller
{
    public function userList(User $user) {
        try {
            $allUser = $user->userList();
            return response()->json($allUser);
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }

        return ;
    }
    //backlogAPI情報を設定
    public function settingBacklog (User $user, Request $request) {
        $input = $request->input('id');
        $allData = $request->all();
        try {
            $allUser = $user->settingBacklog($input, $allData);
            return response()->json($allUser);
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    //user情報とってくる
    public function getUserData (User $user, $id) {
        try {
            $user = $user->getUserData($id);
            Log::info($user);
            return response()->json($user);
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }

}
