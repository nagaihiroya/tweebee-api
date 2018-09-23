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

class TwitterController extends Controller
{
    /**
     * 趣味情報ツイート
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function hobbyTweet(Request $request)
    {
        $data = $request->all();

        // パラメータの整合性チェック
        $result = UserFoundation::paramValidationTweet($data);
        if (!empty($result)) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::PARAMETER_INVALID_ERROR, $result);
        }
        // 趣味情報を取得
        $hobbyInfo = UserHobby::getUserHobbyInfoForTweet($data);
        // ツイートを作成
        $tweet = TwitterUtil::makeTweet($hobbyInfo);
        // ツイート
        $result = TwitterUtil::sendTweet($data, $tweet);
        if (!$result) {
            return CommonUtil::makeResponseParam(400, StatusCodeConst::TWEET_FAILD_ERROR);
        }
        return CommonUtil::makeResponseParam(200, StatusCodeConst::SUCCESS_CODE);
    }
}
