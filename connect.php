<?php

    $dbhost = 'rei.cs.ndsu.nodak.edu';
    $dbuser = 'sam_spieker_371s24';
    $dbpass = '4b70KFrX6N0!';
    $dbname = 'sam_spieker_db371s24';
    
    $database = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n".$conn -> error);
    
    if ($database -> connect_errno) {
        die("Falied to connect to MySQL: ($database -> connect_error");
    }

?>