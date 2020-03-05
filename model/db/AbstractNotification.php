<?php

namespace App\Model\Db;

/* this class has two subclasses which will manipulate the same DB entity 'Notifications' */

abstract class AbstractNotification{
    
    private $message;


    abstract protected function isChecked();


}

?>