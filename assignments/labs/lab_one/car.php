<?php
//class car
class Car{
    public $make;
    public $model;
    public $year;

    public function getInfo(){
        return $this->year ."". $this->make ."". $this->model;
    }

}


