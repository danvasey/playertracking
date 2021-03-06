<?php

include '../run.php';
class playerList {  
     public $link;
     public $playerList; 
           
   public function __construct() {
       $conn = new DdataConn();
       $this->link = $conn->connect();
       return true;
   }
   
   public function getPlayers($gameName){
       $q = $this->link->prepare("SELECT *, userName FROm game JOIN users ON gamePlayerID = users.userID WHERE gameName =? "); 
       $value = array($gameName); 
       $q->execute($value);
       
       $results = $q->fetchALL(PDO::FETCH_ASSOC);
       $this->playerList = $results; 
       return true;
   }
   
}
