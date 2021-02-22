<?php
namespace Xrc\Fpx\Utils;

use Xrc\Fpx\Constants\AmbientEnum;
use Xrc\Fpx\Constants\EnvironOption;

class HttpClientUtils{
    public static function getAddress($ambient){
        return AmbientEnum::SANDBOX_ADDRESS == $ambient ? EnvironOption::SANDBOX_ADDRESS : EnvironOption::FORMAT_ADDRESS;
    }
    /**
     * @param string $url
     * @param bool $body
     * @return bool|string
     */
    protected static function post(string $url, string $body)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
