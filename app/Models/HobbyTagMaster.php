<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HobbyTagMaster extends Model
{
    /**
     * 値の更新をプログラムから行わないカラムリスト
     */
    protected $guarded = ['id', 'updated_at', 'created_at'];

    protected $primaryKey = 'id';

    /**
     * 趣味ジャンルマスタ取得
     *
     * @return array 趣味ジャンルマスタ
     */
    public static function getHobbyTagMaster()
    {
        return DB::table('hobby_tag_master')->where('is_active', 1)->get();
    }
}
