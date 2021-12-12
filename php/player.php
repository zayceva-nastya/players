<?php 

class Player{
    private string $name;
    private string $city;


    public function __construct($name){
        $this->name = $name;
    }

    public function setCity($city){
        $this->city = $city;
        return $this;
    }
}



?>