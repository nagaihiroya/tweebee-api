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
    private function twitterInfoShaper($twitterUserInfo)
    {
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

    /**
     * ツイートする
     *
     * @param array $data ユーザー情報
     * @param string $tweet ツイート文章
     * @return boolean 処理成否
     */
    public function sendTweet($data, $tweet)
    {
        // 認証情報取得
        $twitterOAuth = self::getTwitterOAuth($data['oauth_token'], $data['oauth_token_secret']);
        // twitterアカウント情報を取得
        $result = $twitterOAuth->post("statuses/update", array("status" => $tweet));
        if (isset($result->errors)) {
            return false;
        }
        return true;
    }

    /**
     * ツイッター認証情報取得
     *
     * @param string $oauthToken 認証トークン
     * @param string $oauthTokenSecret 認証秘密トークン
     * @return object TwitterOAuth
     */
    private function getTwitterOAuth($oauthToken, $oauthTokenSecret)
    {
        return new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            $oauthToken,
            $oauthTokenSecret
        );
    }

    /**
     * ツイート文章を作成
     *
     * @param array $hobbyInfo ユーザー趣味情報
     * @return string ツイート文章
     */
    public function makeTweet($hobbyInfo)
    {
        $emoji = ['🥇', '🥈', '🥉'];
        $count = 0;
        $tweet = '#TweeBee で自分の趣味を公開しよう！\n僕の趣味はこれ！\n\n';
        foreach ($hobbyInfo as $key => $value) {
            $category = $value->category_name;
            $genre = isset($value->genre_name) ? '/' . $value->genre_name : '';
            $tag = isset($value->tag_name) ? '/' . $value->tag_name : '';
            $tweet .= $emoji[$count] . "${category}${genre}${tag}\n";
            ++$count;
        }
        $tweet .= 'http://tweebee.net';

        // 改行コード変換
        return str_replace('\\n', PHP_EOL, $tweet);
    }
}