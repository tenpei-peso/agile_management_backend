<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Exception;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    //userの一覧
    public function userList() {
        try {
            $allUser = $this->all();
            return $allUser;
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    //ログイン中のuser情報取得
    public function getUserData($id) {
        try {
            $userData = $this->where('id', $id)->get();
            return $userData;
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }

        //backlogAPI情報を設定
    public function settingBacklog($input, $allData) {
        try {
            unset($allData['id']);
            Log::info($allData);
            $settingData = $this->where('id', $input)->update($allData);
            return $settingData;
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
