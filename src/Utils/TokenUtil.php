<?php

namespace XRC\Fpx\Utils;


class TokenUtil extends HttpClientUtils
{
    public static function getToken($clientId, $redirectUri, $clientSecret, $code, $grantType, $ambient){
        $urlProfiles = self::getAddress($ambient);
        $url = sprintf($urlProfiles . "%s", "/accessToken/get");
        $result = null;
        $post_body = array(
            "client_id" => $clientId,
            "redirect_uri"=> $redirectUri,
            "client_secret"=> $clientSecret,
            "grant_type"=> $grantType,
            "code"=> $code
        );
        return self::post($url, json_encode($post_body));
    }
    public static function getTokenByRefreshToken($clientId, $clientSecret, $grantType, $refreshToken, $redirectUri, $ambient){
        $urlProfiels = self::getAddress($ambient);
        $url = sprintf($urlProfiels . "%s", "/accessToken/get");
        $result = null;
        $post_body = array(
           "client_id"=>$clientId,
           "client_secret"=>$clientSecret,
           "grant_type"=>$grantType,
           "refresh_token"=>$refreshToken,
           "redirect_uri"=>$redirectUri,
        );

        return self::post($url, json_encode($post_body));
    }
}