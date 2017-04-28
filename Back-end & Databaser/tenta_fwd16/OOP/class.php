
<?php

// Texaco class
class Texaco {
    public function refuel() {
       return "Got fule, thanks Texaco";
    }
}

// abstract Aircraft class!
abstract class Aircraft {

    private $speed = null;
    private $range = null;
    private $payload = null;
    private $id = null;
    
    public function bingo() {
        $getFuel = new Texaco;
        return $getFuel -> refuel();
    }

    public function warning() {
       return "WARNING!!! Boogie 9 oclock, Angels 5";
    }
}


class Jakt extends Aircraft {
    private $missiles = null;

    function __construct($speed, $range, $payload, $id, $missiles) {
       $this->speed = $speed;
       $this->range = $range;
       $this->payload = $payload;
       $this->id = $id;
       $this->missiles = $missiles;
   }
}

   class Bomber extends Aircraft {
    private $bombs = null;

    function __construct($speed, $range, $payload, $id ,$bombs) {
       $this->speed = $speed;
       $this->range = $range;
       $this->payload = $payload;
       $this->id = $id;
       $this->bombs = $bombs;
   }
}





?>