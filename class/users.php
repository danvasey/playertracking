<?php


include 'DdataConn.php';

class users {
    public $link; 
    public $user; 
    public $active;
    public $id; 
    public $name;


    const USER_ADMIN = 1; 
    const USER_USER = 2; 
    const USER_SUPERVISOR = 3; 
    
    
    public function __construct() {
        $conn = new DdataConn();
        $this->link = $conn->connect(); 
    }
    
    public function open($id){
        $q = $this->link->prepare("SELECT * FROM users WHERE userID = ? LIMIT 1 "); 
        $v = array($id); 
        $q->execute($v); 
        $results = $q->fetchALL(PDO::FETCH_ASSOC); 
       
        $this->loadUser($results);
        return true; 
    }
    
    private function loadUser($results){
        $this->name = $results[0]['userName'];
        $this->userID = $results[0]['userID'];
    }
    
      private function match($v1,$v2){
          
        if($v1===$v2){
            return true;
        }else{
      return false;}}
    
    
    public function login($username,$password){
        $q = $this->link->prepare("SELECT userID,userPassword FROM users WHERE userName=? LIMIT 1"); 
        $v = array($username); 
        $q->execute($v); 
        $results = $q->fetchALL(PDO::FETCH_ASSOC); 
      
          if(count($results)>0){
         if($this->match($password, $results[0]['userPassword'])){
            $this->active = true;
            $this->id  = $results[0]['userID'];
            $this->name = $username;
            return true; 
        }else
        {
            return false;
          }}else
              
              return false;
    }
    
    
    public function setPassword($new,$id){
        $query = $this->link->prepare("UPDATE users SET userPassword = ? WHERE userID = ? "); 
        $new = $this->hash($new);
        $values = array($new,$id); 
        if($query->execute($values)){
            
            return true; 
        }else
        {
        
            return false; }
        
        
    }
    
    public static function hash($key){
        $value = hash('sha256',$key);    
        return $value;
    }
    
    
    
    
    
  
    
    
    
}
