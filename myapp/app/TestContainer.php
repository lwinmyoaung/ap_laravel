<?php

namespace App;

class TestContainer{
    
    protected $bindings = [];
    public function bind($key,$value){
        $this->bindings[$key]= $value;
    }

    public function resolve($key){
        // Test class ရဲ့ instance ကိုလိုချင်လို့
        return call_user_func($this->bindings[$key]);
    }
}