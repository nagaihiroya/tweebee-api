<?php
namespace App\Utils;

use App\Constants\CommonConst;
use App\Constants\StatusCodeConst;

class CommonUtil
{
    /**
     * レスポンスパラメータ作成
     *
     * @param int $statusCode HTTPステータスコード
     * @param int $code 結果コード
     * @param array $data 結果データ
     * @return string レスポンスデータ
     */
    public function makeResponseParam($statusCode, $code, $data = null)
    {
        $result = empty($data) ? [] : $data;

        return response()->json(['code' => $code, 'result' => $result], $statusCode);
    }

    /**
     * 趣味マスタを全件を整形(ツリー構造)
     *
     * @param array $category 趣味カテゴリ情報
     * @param array $genre 趣味ジャンル情報
     * @param array $tag 趣味タグ情報
     * @return array $result 趣味マスタ情報
     */
    public function allHobbyMasterShaper($category, $genre, $tag)
    {
        $tagTmp = [];
        foreach ($tag as $value) {
            $tagTmp[$value->genre_id][] = ['tagId' => $value->id, 'tagName' => $value->tag_name];
        }
        $genreTmp = [];
        foreach ($genre as $value) {
            $genreTmp[$value->category_id][] = ['genreId' => $value->id, 'genreName' => $value->genre_name, 'tag' => $tagTmp[$value->id]];
        }
        $result = [];
        foreach ($category as $value) {
            $result[] = ['categoryId' => $value->id, 'categoryName' => $value->category_name, 'genre' => $genreTmp[$value->id]];
        }
        return $result;
    }

    /**
     * 趣味マスタをid => nameの形に整形
     *
     * @param array $category 趣味カテゴリ情報
     * @param array $genre 趣味ジャンル情報
     * @param array $tag 趣味タグ情報
     * @return array $result 趣味マスタ情報
     */
    public function hobbyMasterShaper($category, $genre, $tag)
    {
        $tags = [];
        foreach ($tag as $value) {
            $tags[$value->id] = $value->tag_name;
        }
        $genres = [];
        foreach ($genre as $value) {
            $genres[$value->id] = $value->genre_name;
        }
        $categories = [];
        foreach ($category as $value) {
            $categories[$value->id] = $value->category_name;
        }
        return [$categories, $genres, $tags];
    }
}