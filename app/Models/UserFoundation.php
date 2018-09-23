<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class UserFoundation extends Model
{
    /**
     * 値の更新をプログラムから行わないカラムリスト
     */
    protected $guarded = ['id', 'updated_at', 'created_at'];

    protected $primaryKey = 'id';

    /**
     * ユーザー登録
     *
     * @param array $data ユーザー情報配列
     * @return string 処理成否
     */
    public static function insertUserFoundation($data)
    {
        return self::insert($data);
    }

    /**
     * パラメータの整合性チェック
     *
     * @param $data リクエストパラメータ
     * @return array エラー配列
     */
    public static function paramValidation($data)
    {
        $validatedData = Validator::make($data,[
            'user_id' => ['required','max:255'],
        ]);

        return $validatedData->errors()->all();
    }

    /**
     * ユーザーが登録済みかどうか判定
     *
     * @param array $data ユーザー基礎情報
     * @return bool 登録済みかどうか
     */
    public static function checkAlreadyRegister($data)
    {
        $result = UserFoundation::where('user_id', $data['user_id'])
            ->where('is_active', 1)
            ->first();

        if (empty($result)) {
            return false;
        }
        return true;
    }

    /**
     * ユーザー情報登録データセット
     *
     * @param array $data パラメータ配列
     * @param array 登録データ
     */
    public static function registDataSet($data)
    {
        return array(
            'user_id' => $data['user_id'],
        );
    }

    /**
     * パラメータの整合性チェック(getUserInfo)
     *
     * @param $data リクエストパラメータ
     * @return array エラー配列
     */
    public static function paramValidationUserInfo($data)
    {
        $validatedData = Validator::make($data,[
            'user_id' => 'required',
        ]);

        return $validatedData->errors()->all();
    }

    /**
     * 過去に登録済みの場合は有効化する
     *
     * @param array $data ユーザー基礎情報
     * @return boolean 処理成否
     */
    public static function checkPastRegistered($data)
    {
        return UserFoundation::where('user_id', $data['user_id'])
            ->where('is_active', 0)
            ->update(['is_active' => 1]);
    }

    /**
     * ユーザー論理削除
     *
     * @param array $data ユーザー基礎情報
     * @return boolean 処理成否
     */
    public static function deleteUserFoundation($data)
    {
        return UserFoundation::where('user_id', $data['user_id'])
            ->where('is_active', 1)
            ->update(['is_active' => 0]);
    }

    /**
     * パラメータの整合性チェック(tweet)
     *
     * @param $data リクエストパラメータ
     * @return array エラー配列
     */
    public static function paramValidationTweet($data)
    {
        $validatedData = Validator::make($data,[
            'user_id' => 'required',
            'oauth_token' => 'required',
            'oauth_token_secret' => 'required',
        ]);

        return $validatedData->errors()->all();
    }
}
