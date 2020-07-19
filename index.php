<?php
    if(count($_POST)==1) {
        foreach($_POST as $filename=>$data) {
            if(!ctype_alnum($filename)) die("Filename must be alphanumeric");
            $filename = strtolower($filename).".txt";
            file_put_contents($filename, $data.PHP_EOL, FILE_APPEND);
            $proto = $_SERVER['HTTPS'] == "on" ? "https://" : "http://";
            echo $proto.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$filename;
        }
    }
    else {
        die("Incorrect input");
    }
?>
