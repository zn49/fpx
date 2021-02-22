<?php
namespace Xrc\Fpx\Model;
class ResponseMsg{
    public $result;
    public $msg;
    public $errors;
    public $data;

    public function __construct($result, $msg, $errors, $data){
        $this->result = $result;
        $this->msg = $msg;
        $this->errors = $errors;
        $this->data = $data;
    }
    public function __toString(){
        return "ResponseMsg{result='" . $this->result . '\'' . ", msg='" . $this->msg . '\'' . ", errors=" . $this->errors . ", data=" . $this->data . '}';
        
    }
    public static function fail($msg){
        return new ResponseMsg("",$msg, "", "");
    }
}
