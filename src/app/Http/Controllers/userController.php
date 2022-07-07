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
}
