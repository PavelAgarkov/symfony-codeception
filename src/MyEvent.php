<?php

namespace App;

use Symfony\Contracts\EventDispatcher\Event;

class MyEvent extends Event
{
    public function ex() {
        echo 'MyEvent::ex() <br> ';
    }
}