<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFoundation;
use App\Constants\ErrorConst;
use CommonUtil;

class UserController extends Controller
{
    /**
     * ユーザー登録API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function foundationRegister(Request $request) {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserFoundation::paramValidation($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, ErrorConst::PARAMETER_INVALID_ERROR, $result);
        }

        // 登録データセット
        $registData = UserFoundation::registDataSet($data);
        // ユーザー基礎情報登録
        $result = UserFoundation::insertUserFoundation($registData);
        if (!$result) {
            return CommonUtil::makeResponseParam(404, ErrorConst::REGIST_FAILD_ERROR);
        }

        return CommonUtil::makeResponseParam(200, 000);
    }
}
