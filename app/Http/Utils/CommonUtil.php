<?php
namespace App\Utils;

use App\Constants\CommonConst;
use App\Constants\ErrorConst;

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
        $result = empty($data) ? null : $data;

        return response()->json(['code' => $code, 'result' => $result], $statusCode);
    }
}