<?php 
    function create_connection(){
        $host= "localhost";
        $username= "root";
        $password= "";
        $database="hustlehubdb";
        
        return new mysqli($host,$username,$password,$database);
    }