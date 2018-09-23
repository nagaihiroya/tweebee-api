<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class HobbyCategoryMaster extends Model
{
    /**
     * 値の更新をプログラムから行わないカラムリスト
     */
    protected $guarded = ['id', 'category_name', 'is_active', 'updated_at', 'created_at'];

    protected $primaryKey = 'id';

    /**
     * 趣味カテゴリマスタ取得
     *
     * @return array 趣味カテゴリマスタ
     */
    public static function getHobbyCategoryMaster()
    {
        return DB::table('hobby_category_master')->where('is_active', 1)->get();
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
            'parent_id' => 'required|max:255',
            'name' => ['required','max:255',"regex:/^(?:(?![\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]).)*$/"],
        ]);

        return $validatedData->errors()->all();
    }

    /**
     * 趣味がすでに登録されているか判定
     *
     * @param array $apiTypes API種別
     * @param array $data 趣味登録データ
     * @return boolean 結果
     */
    public static function isAlreadyRegisterHobby($apiTypes, $data)
    {
        $result = DB::table($apiTypes['tableName'])
            ->where('is_active', 1)
            ->where($apiTypes['parentIdColumnName'], $data['parent_id'])
            ->where($apiTypes['nameColumnName'], $data['name'])
            ->first();

        if (empty($result)) {
            return false;
        }
        return true;
    }

    /**
     * ユーザー趣味情報登録データセット処理
     *
     * @param array $apiTypes API種別
     * @param array $data パラメータ配列
     * @param array 登録データ
     */
    public static function registDataSet($apiTypes, $data)
    {
        return array(
            $apiTypes['parentIdColumnName'] => $data['parent_id'],
            $apiTypes['nameColumnName'] => $data['name'],
        );
    }

    /**
     * 趣味新規登録
     *
     * @param array $apiTypes API種別
     * @param array $data 登録データ
     * @return int 新規採番されたID
     */
    public static function registerHobby($apiTypes, $data)
    {
        return DB::table($apiTypes['tableName'])->insertGetId($data);
    }

    /**
     * 趣味情報取得
     *
     * @param array $apiTypes API種別
     * @param int $id 趣味情報ID
     * @return array 趣味情報
     */
    public static function getHobbyInfo($apiTypes, $id)
    {
        return DB::table($apiTypes['tableName'])
            ->where('is_active', 1)
            ->where('id', $id)
            ->first();
    }

    /**
     * 趣味情報整形
     *
     * @param array $apiTypes API種別
     * @param array $data 趣味情報
     * @return array 結果配列
     */
    public static function hobbyShaper($apiTypes, $data)
    {
        $parent = $apiTypes['parentIdColumnName'];
        $name = $apiTypes['nameColumnName'];

        return array(
            'id' => $data->id,
            'name' => $data->$name,
            'parentType' => $parent,
            'parentId' => $data->$parent,
        );
    }
}
