<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
