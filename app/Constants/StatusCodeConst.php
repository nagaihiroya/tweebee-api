<?php

namespace App\Constants;

/**
 * ステータスコード定数クラス
 */
class StatusCodeConst
{
    // 正常終了コード
    const SUCCESS_CODE = "000";
    // パラメータバリデーションエラーコード
    const PARAMETER_INVALID_ERROR = "101";
    // パラメータバリデーションエラーコード
    const REGIST_FAILD_ERROR = "102";
    // ユーザー取得失敗エラーコード
    const USER_NOT_EXIST_ERROR = "103";
    // ユーザー趣味情報登録失敗エラーコード
    const USER_HOBBY_REGISTER_ERROR = "104";
    //　ユーザー趣味情報削除失敗エラーコード
    const USER_HOBBY_DELETE_ERROR = "105";
}