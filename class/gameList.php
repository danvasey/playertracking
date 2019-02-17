<?php

include '../run.php';

class gameList {
      public $link;
      public $gameList;
           
           
   public function __construct($loadlist = null) {
       $conn = new DdataConn();
       $this->link = $conn->connect();
       
       if($loadlist !==null){
           $this->gameList = $this->getList();
       }
   }
   
   public function getList(){
       $q = $this->link->prepare("SELECT DISTINCT * FROM game "); 
       $q->execute();
       $results = $q->fetchALL(PDO::FETCH_ASSOC);
       return $results;
   }
   
}
