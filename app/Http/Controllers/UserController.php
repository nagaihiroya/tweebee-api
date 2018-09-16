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
        // ユーザーが登録済みかどうかの判定
        $result = UserFoundation::checkAlreadyRegister($data['user_id']);
        if ($result) {
            return CommonUtil::makeResponseParam(200, 000, 'already');
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

    /**
     * ユーザー情報返却API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getUserInformation(Request $request) {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserFoundation::paramValidationUserInfo($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, ErrorConst::PARAMETER_INVALID_ERROR, $result);
        }

        // TODO: フロント実装のためにテストデータを返す nagai
        // ユーザー基礎情報取得
        // $userData = UserFoundation::where('user_id', $data['user_id'])->first();
        // if (empty($userData)) {
        //     return CommonUtil::makeResponseParam(400, ErrorConst::USER_NOT_EXIST_ERROR);
        // }
        $stub = ['id' => '1260664039', 'name' => 'あしかわ', 'screen_name' => 'pd_made', 'description' => 'プログラマー/the BANZ_vo/黒猫_vo/NAMAZ_vo', 'location' => '', 'url' => null, 'profile_image_url_https' => 'https://pbs.twimg.com/profile_images/950286267647799296/FspWXyM__normal.jpg'];
        return CommonUtil::makeResponseParam(200, 000, $stub);
    }
}
