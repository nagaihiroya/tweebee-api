<?php
namespace App\Utils;

use App\Constants\CommonConst;
use App\Constants\StatusCodeConst;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterUtil
{
    /**
     * twitterアカウント情報取得
     *
     * @param array $userData ユーザーデータ
     * @return array レスポンスデータ
     */
    public function getTwitterInfo($userData)
    {
        $twitterUser = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            $userData['oauth_token'],
            $userData['oauth_token_secret']
        );

        // twitterアカウント情報を取得
        $twitterUserInfo = $twitterUser->get('account/verify_credentials');
        if (isset($twitterUserInfo->errors)) {
            return null;
        }
        return self::twitterInfoShaper($twitterUserInfo);
    }

    /**
     * twitterアカウント情報を整形
     *
     * @param array $twitterUserInfo アカウント情報
     * @return array $result アカウント情報(整形済み)
     */
    private function twitterInfoShaper($twitterUserInfo) {
        return $result = [
            'id' => $twitterUserInfo->id,
            'name' => $twitterUserInfo->name,
            'screen_name' => $twitterUserInfo->screen_name,
            'description' => $twitterUserInfo->description,
            'location' => $twitterUserInfo->location,
            'url' => $twitterUserInfo->url,
            'profile_image_url_https' => $twitterUserInfo->profile_image_url_https,
        ];
    }
}