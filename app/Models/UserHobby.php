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
            'category_id' => 'required|max:255',
            'genre_id' => 'max:255',
            'tag_id' => 'max:255',
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

    /**
     * パラメータの整合性チェック(取得)
     *
     * @param $data リクエストパラメータ
     * @return array エラー配列
     */
    public static function paramValidationHobbyGet($data)
    {
        $validatedData = Validator::make($data,[
            'user_id' => ['required','max:255'],
        ]);

        return $validatedData->errors()->all();
    }

    /**
     * ユーザー趣味情報取得
     *
     * @param array $data ユーザー情報(ユーザーID)
     * @return array $result ユーザー趣味情報
     */
    public static function getUserHobbyInfo($data)
    {
        $result = [];
        $tmp = DB::table('user_hobbies')
            ->where('user_id', $data['user_id'])
            ->where('is_active', 1)
            ->orderBy('id', 'asc')
            ->get();
        foreach ($tmp as $value) {
            $result[] = $value;
        }
        return $result;
    }

    /**
     * ユーザー趣味情報整形
     *
     * @param array $data ユーザー趣味情報
     * @return array $result ユーザー趣味情報(整形済み)
     */
    public static function userHobbyInfoShaper($data, $hobbyMaster)
    {
        list($category, $genre, $tag) = $hobbyMaster;

        $result = [];
        foreach ($data as $value) {
            $result[] = [
                'hobbyId' => $value->id,
                'hobbyInfo' => [
                    'categoryId' => $value->category_id,
                    'categoryName' => $category[$value->category_id],
                    'genre' => [
                        'genreId' => isset($value->genre_id) ? $value->genre_id : null,
                        'genreName' => isset($genre[$value->genre_id]) ? $genre[$value->genre_id] : null,
                        'tag' => [
                            'tagId' => isset($value->tag_id) ? $value->tag_id : null,
                            'tagName' => isset($tag[$value->tag_id]) ? $tag[$value->tag_id] : null,
                        ],
                    ],
                ],
            ];
        }
        return $result;
    }

    /**
     * ユーザー趣味情報が登録済み判定
     *
     * @param $data ユーザー趣味情報
     * @return bool 登録済みか
     */
    public static function isAlreadyRegister($data)
    {
        $result = DB::table('user_hobbies')
            ->where('user_id', $data['user_id'])
            ->where('is_active', 1)
            ->where('category_id', $data['category_id'])
            ->where('genre_id', isset($data['genre_id']) ? $data['genre_id'] : null)
            ->where('tag_id', isset($data['tag_id']) ? $data['tag_id'] : null)
            ->first();

        if (empty($result)) {
            return false;
        }
        return true;
    }
}
