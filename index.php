<?php
    if(isset($_POST) && count($_POST)) {
        foreach($_POST as $filename=>$data) {
            if(!ctype_alnum($filename)) {
                echo "Error: Filename must be alphanumeric";
                continue;
            }
            $filename = strtolower($filename).".txt";
            if(@file_put_contents($filename, $data.PHP_EOL, FILE_APPEND)) {
                $proto = $_SERVER['HTTPS'] == "on" ? "https://" : "http://";
                echo $proto.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$filename.PHP_EOL;
            }
            else {
                echo "Error: File write error".PHP_EOL;
            }
        }
    }
?>
