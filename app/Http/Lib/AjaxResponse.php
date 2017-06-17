<?php
/**
 * Created by PhpStorm.
 * User: gabrieljo1302
 * Date: 9/12/15
 * Time: 1:37 AM
 */
namespace App\Http\Lib;

class AjaxResponse
{
    public $success;
    public $error_code;
    public $error_msg;
    public $data;
    public function __construct($success = false, $error_code = 0, $error_msg='', $data = array()){
        $this->success      = $success;
        $this->error_code   = $error_code;
        $this->error_msg    = $error_msg;
        $this->data         = $data;
    }
    public function toArray(){
        return array(
            'success'   => $this->success,
            'error'     => array(
                'error_code'=> $this->error_code,
                'error_msg' => $this->error_msg,
            ),
            'data' => $this->data
        );
    }
}
