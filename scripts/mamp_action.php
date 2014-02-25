<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();

$args = $argv[1];
$args = str_replace(" ","",$args);

$mamp_hosts_path = $home."/Library/Application Support/appsolute/MAMP PRO/httpd.conf";
if (file_exists($mamp_hosts_path))
{
    $lineNumber = getLineWithString($mamp_hosts_path,$args);
    $lineNumber = $lineNumber - 3;
    $desiredLine = grabLine($mamp_hosts_path,$lineNumber);
    $server = str_replace("ServerName ","",$desiredLine);
    $server = trim($server);
    shell_exec("open http://$server");
}

function getLineWithString($fileName, $str) {
    //http://stackoverflow.com/questions/9721952/search-string-and-return-line-php
    $lines = file($fileName);
    foreach ($lines as $lineNumber => $line) {
        if (strpos($line, $str) !== false) {
            return $lineNumber;
        }
    }
    return -1;
}

function grabLine($fileName,$Dline){
    $lines = file($fileName);
    foreach ($lines as $lineNumber => $line){
        if ($lineNumber == $Dline){
            return $line;
        }
    }
}


?>
