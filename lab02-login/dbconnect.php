<?php

	 $DBhost = "localhost:3306";
	 $DBuser = "root";
	 $DBpass = "root";
	 $DBname = "loginsignup";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
