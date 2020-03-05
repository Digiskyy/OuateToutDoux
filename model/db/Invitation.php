<?php

namespace App\Model\Db;

class Invitation{

    function __construct(String $msg) {
        $this->checked = false;
        $this->message = $msg;
    }


    public function isChecked(){
        return $this->checked;
    }

    public function isAccepted(){}

    public function isRejected(){}


}

?>