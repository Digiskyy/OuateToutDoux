<?php

namespace App\Model\Db;

class Notification{

    function __construct(String $msg) {
        $this->checked = false;
        $this->message = $msg;
    }

    public function isChecked(){
        return $this->checked;
    }




}

?>