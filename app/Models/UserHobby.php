<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class UserHobby extends Model
{
    /**
     * 値の更新をプログラムから行わないカラムリスト
     */
    protected $guarded = ['id', 'updated_at', 'created_at'];

    protected $primaryKey = 'id';

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
            'category_id' => ['required','max:255',"regex:/^(?:(?![\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]).)*$/"],
            'genre_id' => ['max:255',"regex:/^(?:(?![\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]).)*$/"],
            'tag_id' => ['max:255',"regex:/^(?:(?![\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]).)*$/"],
        ]);

        return $validatedData->errors()->all();
    }

    /**
     * ユーザー趣味情報登録
     *
     * @param array $data ユーザー趣味情報配列
     * @return int 採番されたhobby_id
     */
    public static function registerUserHobbyInfo($data)
    {
        return self::insertGetId($data);
    }

    /**
     * ユーザー趣味情報登録データセット処理
     *
     * @param array $data パラメータ配列
     * @param array 登録データ
     */
    public static function registDataSet($data)
    {
        return array(
            'user_id' => $data['user_id'],
            'category_id' => $data['category_id'],
            'genre_id' => isset($data['genre_id']) ? $data['genre_id'] : null,
            'tag_id' => isset($data['tag_id']) ? $data['tag_id'] : null,
            'is_active' => 1,
        );
    }

    /**
     * パラメータの整合性チェック(削除)
     *
     * @param $data リクエストパラメータ
     * @return array エラー配列
     */
    public static function paramValidationHobbyDelete($data)
    {
        $validatedData = Validator::make($data,[
            'user_id' => ['required','max:255'],
            'hobby_id' => 'required',
        ]);

        return $validatedData->errors()->all();
    }

    /**
     * ユーザー趣味情報の論理削除
     *
     * @param array $data ユーザー趣味情報
     * @return boolean 削除成否
     */
    public static function deleteUserHobbyInfo($data)
    {
        return DB::table('user_hobbies')
            ->where('id', $data['hobby_id'])
            ->where('user_id', $data['user_id'])
            ->update(['is_active' => 0]);
    }
}
