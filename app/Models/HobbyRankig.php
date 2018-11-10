<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class HobbyRankig extends Model
{
    /**
     * パラメータの整合性チェック
     *
     * @param $data リクエストパラメータ
     * @return array エラー配列
     */
    public static function paramValidation($data)
    {
        $validatedData = Validator::make($data,[
            'limit' => 'numeric',
        ]);

        return $validatedData->errors()->all();
    }

    /**
     * 趣味ランキング取得
     *
     * @param array $apiTypes API種別
     * @param int $limit 趣味ランキング取得件数
     * @return array $result 趣味ランキング情報
     */
    public static function getHobbyRanking($apiTypes, $limit)
    {
        $result = [];
        $tmp = DB::table($apiTypes['tableName'])
            ->select("${apiTypes['masterTableName']}.id", "${apiTypes['tableName']}.count", "${apiTypes['masterTableName']}.${apiTypes['masterNameColumnName']} as name")
            ->leftjoin($apiTypes['masterTableName'], "${apiTypes['masterTableName']}.id", '=', "${apiTypes['tableName']}.id")
            ->orderBy("${apiTypes['tableName']}.count", 'desc')
            ->orderBy("${apiTypes['tableName']}.id", 'asc')
            ->limit($limit)
            ->get();
        foreach ($tmp as $value) {
            $result[] = $value;
        }
        return $result;
    }

    /**
     * 趣味ランキング整形
     *
     * @param array $data 趣味ランキング情報
     * @return array $result 整形済み趣味ランキング情報
     */
    public static function hobbyRankingShaper($data)
    {
        $result = [];
        foreach ($data as $value) {
            $result[] = [
                'id' => $value->id,
                'count' => $value->count,
                'name' => $value->name,
            ];
        }
        return $result;
    }
}
