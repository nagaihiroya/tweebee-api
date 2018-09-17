<?php

namespace App\Constants;

/**
 * 共通定数クラス
 */
class CommonConst
{
    // 趣味API種別
    const HOBBY_API_TYPES = [
        'genre' => [
            'tableName' => 'hobby_genre_master',
            'parentIdColumnName' => 'category_id',
            'nameColumnName' => 'genre_name',
        ],
        'tag' => [
            'tableName' => 'hobby_tag_master',
            'parentIdColumnName' => 'genre_id',
            'nameColumnName' => 'tag_name',
        ],
    ];
}