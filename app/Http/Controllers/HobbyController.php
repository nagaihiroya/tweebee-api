<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HobbyCategoryMaster;
use App\Models\HobbyGenreMaster;
use App\Models\HobbyTagMaster;
use App\Constants\StatusCodeConst;
use App\Constants\CommonConst;
use CommonUtil;

class HobbyController extends Controller
{
    /**
     * 趣味マスタ返却API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getHobbyMaster(Request $request)
    {
        $data = $request->all();

        $category = HobbyCategoryMaster::getHobbyCategoryMaster();
        $genre = HobbyGenreMaster::getHobbyGenreMaster();
        $tag = HobbyTagMaster::getHobbyTagMaster();

        // 各マスタデータ整形
        $hobbyMaster = CommonUtil::allHobbyMasterShaper($category, $genre, $tag);

        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE, $hobbyMaster);
    }

    /**
     * 趣味新規登録API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function hobbyRegister($type, Request $request)
    {
        $const = CommonConst::HOBBY_API_TYPES;
        $apiTypes = $const[$type];

        $data = $request->all();
        // パラメータの整合性チェック
        $result = HobbyCategoryMaster::paramValidation($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::PARAMETER_INVALID_ERROR, $result);
        }
        // 趣味がすでに登録されているか判定
        $result = HobbyCategoryMaster::isAlreadyRegisterHobby($apiTypes, $data);
        if ($result) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::HOBBY_ALREADY_REGISTER_ERROR);
        }
        // 登録データセット
        $registerData = HobbyCategoryMaster::registDataSet($apiTypes, $data);
        // 登録処理
        $id = HobbyCategoryMaster::registerHobby($apiTypes, $registerData);
        $hobbyData = HobbyCategoryMaster::getHobbyInfo($apiTypes, $id);

        $parent = $apiTypes['parentIdColumnName'];
        $name = $apiTypes['nameColumnName'];

        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE, ['id' => $hobbyData->id, 'type' => $parent, 'parentId' => $hobbyData->$parent, 'name' => $hobbyData->$name]);
    }
}
