<?php

class Campaigns {
    public $name;
    public $size;
    Public $id;
    
    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;        
    }
    
    public function details() {
        echo "\n The campaign details are :: name => {$this->name} and id is => {$this->id}";
    }
}

class Banners extends Campaigns{
    public function __construct($name , $id, $size) {
//        parent::__construct();
        $this->name = $name;
        $this->id = $id;
        $this->size = $size; 
        Campaigns::details();
    }
    
    public function details() {
        
        echo "\n The campaign details are :: name => {$this->name}, id is => {$this->id} and size is => {$this->size}";
    }
}

$ban = new Banners('Test',1,'13.90');
$ban->details();

trait message1 {
    public function msg1(){
        echo "\n\n msg1";
    }
}

trait message2 {
    public function msg2() {
        echo "\n\n msg 2 ";
    }
}

class welcome {
    use message1, message2;
}

$obj = new welcome();
$obj->msg1();
$obj->msg2();

class Test2 {
    const NAME = 'test';
    public $name = 'Bhupendra';
    
}
Test2::NAME;
//Test2::data();

class Bhupendra {
    public static $name = 'Bhupendra dudhwal';
    
    public function test() {
        return self::$name;
    }
}

$obj1 = new Bhupendra();
echo $obj1->test();

