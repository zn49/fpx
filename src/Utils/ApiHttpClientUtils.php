<?php
namespace Xrc\Fpx\Utils;

use Xrc\Fpx\Constants\EnvironOption;
use Xrc\Fpx\Model\AfferentParam;
use Xrc\Fpx\Model\ResponseMsg;

class ApiHttpClientUtils extends HttpClientUtils{
    public static function apiGet(AfferentParam $param, $paramMap, $ambient){
        if(!self::checkParam($param)){
            return ResponseMsg::fail("参数缺失");
        }
        $body = json_encode($paramMap,JSON_PRESERVE_ZERO_FRACTION);
        $url_profile = self::getAddress($ambient);
        $url = $url_profile . EnvironOption::OPEN_API_ROUTER;
        $time = intval(microtime(true) * 1000);
        $sign = SignUtil::getSignByParam($param, $body, $time);
        $url = self::getRequestUrl($param, $url,$time,$sign);

        return self::post($url, $body);
    }
    private static function checkParam(AfferentParam $param){
        return !empty($param->appKey) && !empty($param->version) && !empty($param->method) && !empty($param->format) && !empty($param->language) && !empty($param->appSecret);    
    }
    private static function getRequestUrl(AfferentParam $param, $url, $time, $sign){
        $url .= "?method=" . $param->method;
        $url .= "&app_key=" . $param->appKey;
        $url .= "&v=" . $param->version;
        $url .= "&timestamp=" . $time;
        $url .= "&format=" . $param->format;
        $url .= "&access_token=" . $param->accessToken;
        $url .= "&sign=" . $sign;
        $url .= "&language=" . $param->language;
        return $url;
    }
}

