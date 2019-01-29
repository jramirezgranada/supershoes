<?php

namespace App\Helpers;

class ResponseHelper
{
    public $message;
    public $error_msg;
    public $error_code;
    public $code;
    public $success;
    public $object;

    /**
     * Returns customized object
     * @param $message
     * @param int $code
     * @param bool $success
     * @return $this
     */
    public function getResponseObject($message, $code = 200, $success = true, $object = null)
    {
        if ($success == false) {
            $this->error_msg = $message;
            $this->error_code = $code;
            unset($this->message, $this->code);
        } else {
            $this->message = $message;
            $this->code = $code;
            unset($this->error_msg, $this->error_code);
        }

        $this->success = $success;
        $this->object = $object;
        
        return $this;
    }
}