<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="scripts/jquery-3.3.1.min.js"></script>
        <link type="text/css" href="css/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/javascript" href="css/bootstrap-4.3.1-dist/js/bootstrap.min.js" />
        <link type="text/css" href="css/main.css" rel="stylesheet"/>
        <title></title>
    </head>
    <body>
            <div class="body">
        <form action="index.php?login" method="post">
            <label for="username"> Username</label>
            <input type="text" name="username"/>
            
            <label for="password">Password</label>
            <input type="password" name="password"/>
            <input type="submit" class="btn btn-success"/>
        </form></div>
       
        <?php
        
            /*
             * Include the PHP autoloader registration function for utilizing class libraries
             */
            include 'run.php';
            //Pull Request
            
            
            
            
            if(isset($_GET['login'])){
                include 'controllers/login.php';                
            }
            
            
            
        ?>
    </body>
</html>
