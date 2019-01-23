<?php

namespace App\Constants;

/**
 * 共通定数クラス
 */
class CommonConst
{
    // 趣味ランキング件数初期値
    const RANKING_DEFAULT_LIMIT = 30;
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

    const RANKING_API_TYPES = [
        'category' => [
            'tableName' => 'category_ranking',
            'masterTableName' => 'hobby_category_master',
            'masterNameColumnName' => 'category_name',
        ],
        'genre' => [
            'tableName' => 'genre_ranking',
            'masterTableName' => 'hobby_genre_master',
            'masterNameColumnName' => 'genre_name',
        ],
        'tag' => [
            'tableName' => 'tag_ranking',
            'masterTableName' => 'hobby_tag_master',
            'masterNameColumnName' => 'tag_name',
        ],
    ];
}