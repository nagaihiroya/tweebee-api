<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HobbyCategoryMaster;
use App\Models\HobbyGenreMaster;
use App\Models\HobbyTagMaster;
use App\Constants\ErrorConst;
use CommonUtil;

class HobbyController extends Controller
{
    /**
     * 趣味マスタ返却API
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getHobbyMaster(Request $request) {
        $data = $request->all();

        $category = HobbyCategoryMaster::getHobbyCategoryMaster();
        $genre = HobbyGenreMaster::getHobbyGenreMaster();
        $tag = HobbyTagMaster::getHobbyTagMaster();

        // 各マスタデータ整形
        $hobbyMaster = CommonUtil::allHobbyMasterShaper($category, $genre, $tag);

        return CommonUtil::makeResponseParam(200, 000, $hobbyMaster);
    }
}
