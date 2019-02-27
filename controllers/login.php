<?php
//
// SESSIONS are like Cookies, they can hold information about specific users between pages 
// to use them everypage you need to access the $_SESSION on you need to include session_start(); 
// 

session_start();



if(isset($_POST['username'])){
    
                /*
                /   utils is a class that has static calls [ie the ' :: '] You can call a static function without 
                /   Creating the object first. 
                
                Example
                    
                        class object(){
                            public static function MyStaticFunction(){ echo 'hello static';}
                            public function Myfunction(){echo 'hello';}
                        }
                        
                        $object = new object(); 
                        $object->Myfunction(); 
                            ***output*** 
                            hello 
                              *** END output*** 
                            
                     or without making the object first
                            object::MyStaticFunction; 
                            **** output *****
                                Hello Static 
                            *** END output*** 
                /
                */
    
    $username = utils::getURLParam($_POST, 'username');
    $password = utils::getURLParam($_POST, 'password'); 
    
    $user = new users();
    $login = $user->login($username, $password);
    
    
    
    if(!$login){
        die('Login Failed');}
    
           
    
    
        $_SESSION['userName'] = $user->name;
        $_SESSION['userID'] = $user->id;
        
    // Header can only be called if you don't output anything to the page first. 
    header('location:controllers/home.php');

}
