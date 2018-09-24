<?php

namespace App\Constants;

/**
 * ステータスコード定数クラス
 */
class StatusCodeConst
{
    // 正常終了コード
    const SUCCESS_CODE = '000';
    // パラメータバリデーションエラーコード
    const PARAMETER_INVALID_ERROR = '101';
    // パラメータバリデーションエラーコード
    const REGIST_FAILD_ERROR = '102';
    // ユーザー取得失敗エラーコード
    const USER_NOT_EXIST_ERROR = '103';
    // ユーザー趣味情報登録失敗エラーコード
    const USER_HOBBY_REGISTER_ERROR = '104';
    // ユーザー趣味情報削除失敗エラーコード
    const USER_HOBBY_DELETE_ERROR = '105';
    // ユーザー趣味情報重複エラーコード
    const USER_HOBBY_ALREADY_REGISTER_ERROR = '106';
    // ユーザー趣味情報重複エラーコード
    const HOBBY_ALREADY_REGISTER_ERROR = '107';
    // ユーザー削除エラーコード
    const DELETE_FAILD_ERROR = '108';
    // データ取得エラーコード
    const SELECT_FAILD_ERROR = '110';
}