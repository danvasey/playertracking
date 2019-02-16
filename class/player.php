<?php

include 'DdataConn.php';

class player {
   public $link;
   public $health; 
   public $shield; 
   public $name; 
   public $weapons;
           
           
           
   public function __construct() {
       $conn = new DdataConn();
       $this->link = $conn->connect();
       
   }
   
   public function loadPlayer($playerID){
       /*
        *  Use this section to load information from DB 
        */
   }
   
   public function addName($name){
       $this->name = $name;
   }
   
   public function sayName(){
       echo $this->name;
   }
   
   
   public function attachWeapon($item){
       $this->weapons[] = $item; 
   }
   
   
}
