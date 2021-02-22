<?php

namespace Xrc\Fpx\Utils;

use Xrc\Fpx\Model\AfferentParam;

class SignUtil
{
    public static function getSign($appkey, $format, $method, $timestamp, $version, $bodyJson, $appSecret)
    {
        $signCause = sprintf("app_key%sformat%smethod%stimestamp%sv%s%s%s", $appkey, $format, $method, $timestamp, $version, $bodyJson, $appSecret);
        return md5($signCause);
    }

    public static function getSignByParam(AfferentParam $param, $bodyJson, $timestamp)
    {
        return self::getSign($param->appKey, $param->format, $param->method, $timestamp, $param->version, $bodyJson, $param->appSecret);
    }
}

