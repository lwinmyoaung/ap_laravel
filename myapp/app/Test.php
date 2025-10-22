<?php

namespace App;

class Test{
    // // Local Container Testing
    // public function smth(){
    //     return 'here is something';
    // }

    // Laravel Real Container Testing
    // protected $name;
    // public function __construct($name){
    //     $this->name= $name;
    // }

    // // Creating Manually Facade using Laravel Default Service Provider
    // public function execute(){
    //     dd('facade workings');
    // }


    // // Explict Binding
    // public function execute(){
    //     dd('facade workings');
    // }

    // Implict Binding
    protected $name;
    public function __construct($name){
        $this->name= $name;
    }
    public function execute(){
        return $this->name;
    }
}