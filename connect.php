<?php

    $dbhost = 'rei.cs.ndsu.nodak.edu';
    $dbuser = 'tyler_j_paulson_371s24';
    $dbpass = '0pM5vuhKzN0!';
    $dbname = 'tyler_j_paulson_db371s24';
    
    $database = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n".$conn->error);
    
    if ($database->connect_errno) {
        die("Falied to connect to MySQL: ($database->connect_error");
    }

?>