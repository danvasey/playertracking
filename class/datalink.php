<?php 

class datalink{	
     protected $db_conn; 
     public $db_name = 'apt';
     public $db_user = 'root'; 
     public $db_password = '';
   
   public $db_host = 'localhost';
    function connect(){
       try
       {
        $this->db_conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;",$this->db_user,$this->db_password); 
        return $this->db_conn; 
       }
       catch (PDOException $e)
       {
           return $e->getMessage();  
       }
    }
    
}

?>