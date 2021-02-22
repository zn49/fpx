<?php
namespace Xrc\Fpx\Model;
class AfferentParam{
   public $method;
   public $appKey;
   public $version;
   public $format;
   public $accessToken;
   public $appSecret;
   public $language;

    public function __construct($method, $appKey, $version, $format, $accessToken, $appSecret, $language){
        $this->method = $method;
        $this->appKey = $appKey;
        $this->version = $version;
        $this->format = $format;
        $this->accessToken = $accessToken;
        $this->appSecret = $appSecret;
        $this->language = $language;
    }
}
