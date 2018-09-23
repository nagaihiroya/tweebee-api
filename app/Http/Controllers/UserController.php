<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFoundation;
use App\Models\UserHobby;
use App\Constants\StatusCodeConst;
use App\Models\HobbyCategoryMaster;
use App\Models\HobbyGenreMaster;
use App\Models\HobbyTagMaster;
use CommonUtil;
use TwitterUtil;

class UserController extends Controller
{
    /**
     * ユーザー登録API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function foundationRegister(Request $request)
    {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserFoundation::paramValidation($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::PARAMETER_INVALID_ERROR, $result);
        }
        // ユーザーが登録済みかどうかの判定
        $result = UserFoundation::checkAlreadyRegister($data);
        if ($result) {
            return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE);
        }
        // 過去に登録されていた場合は有効化
        $result = UserFoundation::checkPastRegistered($data);
        if ($result) {
            return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE);
        }
        // 登録データセット
        $registData = UserFoundation::registDataSet($data);
        // ユーザー基礎情報登録
        $result = UserFoundation::insertUserFoundation($registData);
        if (!$result) {
            return CommonUtil::makeResponseParam(404, StatusCodeConst::REGIST_FAILD_ERROR);
        }

        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE);
    }

    /**
     * ユーザー情報返却API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getUserInformation(Request $request)
    {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserFoundation::paramValidationUserInfo($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::PARAMETER_INVALID_ERROR, $result);
        }

        // ユーザー基礎情報取得
        $userData = UserFoundation::where('user_id', $data['user_id'])->first();
        if (empty($userData)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::USER_NOT_EXIST_ERROR);
        }
        $result = TwitterUtil::getTwitterInfo($userData);
        if (empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::USER_NOT_EXIST_ERROR);
        }

        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE, $result);
    }

    /**
     * ユーザー趣味情報登録API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function hobbyInfoRegister(Request $request)
    {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserHobby::paramValidation($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::PARAMETER_INVALID_ERROR, $result);
        }
        // ユーザー趣味情報が登録済みか判定
        $result = UserHobby::isAlreadyRegister($data);
        if ($result) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::USER_HOBBY_ALREADY_REGISTER_ERROR);
        }
        // 登録データセット
        $registData = UserHobby::registDataSet($data);
        $hobbyId = UserHobby::registerUserHobbyInfo($registData);
        if (empty($hobbyId)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::USER_HOBBY_REGISTER_ERROR);
        }

        $result = UserHobby::getHobbyInfoFindByPk($hobbyId);

        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE, $result);
    }

    /**
     * ユーザー趣味情報削除API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function hobbyInfoDelete(Request $request)
    {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserHobby::paramValidationHobbyDelete($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::PARAMETER_INVALID_ERROR, $result);
        }
        // 対象レコードの論理削除
        $result = UserHobby::deleteUserHobbyInfo($data);
        if (!$result) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::USER_HOBBY_DELETE_ERROR);
        }
        // ユーザー趣味情報取得
        $result = UserHobby::getUserHobbyInfo($data);
        if (empty($result)) {
            // 趣味情報が登録されていない場合は空配列を返却
            return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE);
        }
        // 趣味マスタ取得
        $category = HobbyCategoryMaster::getHobbyCategoryMaster();
        $genre = HobbyGenreMaster::getHobbyGenreMaster();
        $tag = HobbyTagMaster::getHobbyTagMaster();
        // マスタデータ整形
        $hobbyMaster = CommonUtil::hobbyMasterShaper($category, $genre, $tag);
        // 結果データの整形
        $userHobbyInfo = UserHobby::userHobbyInfoShaper($result, $hobbyMaster);

        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE, $userHobbyInfo);
    }

    /**
     * ユーザー趣味情報取得API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function hobbyInfoGet(Request $request)
    {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserHobby::paramValidationHobbyGet($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::PARAMETER_INVALID_ERROR, $result);
        }
        // ユーザー趣味情報取得
        $result = UserHobby::getUserHobbyInfo($data);
        if (empty($result)) {
            // 趣味情報が登録されていない場合は空配列を返却
            return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE);
        }

        // 趣味マスタ取得
        $category = HobbyCategoryMaster::getHobbyCategoryMaster();
        $genre = HobbyGenreMaster::getHobbyGenreMaster();
        $tag = HobbyTagMaster::getHobbyTagMaster();
        // マスタデータ整形
        $hobbyMaster = CommonUtil::hobbyMasterShaper($category, $genre, $tag);
        // 結果データの整形
        $userHobbyInfo = UserHobby::userHobbyInfoShaper($result, $hobbyMaster);

        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE, $userHobbyInfo);
    }
}
