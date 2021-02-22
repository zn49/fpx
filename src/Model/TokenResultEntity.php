<?php
class TokenResultEntity{
   public $accessToken;
   public $refreshToken;
   public $expiresIn;

   public function __construct($accessToken, $refreshToken, $expiresIn){
       $this->accessToken = $accessToken;
       $this->refreshToken = $refreshToken;
       $this->expiresIn = $expiresIn;
   }
}
