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
            'user_id' => ['required','unique:user_foundations','max:255'],
            'oauth_token' => 'required|max:255',
            'oauth_token_secret' => 'required|max:255',
        ]);

        return $validatedData->errors()->all();
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
            'oauth_token' => $data['oauth_token'],
            'oauth_token_secret' => $data['oauth_token_secret'],
        );
    }
}
