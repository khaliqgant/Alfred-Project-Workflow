<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();

$args = $argv[1];
$args = str_replace(" ","",$args);

$mamp_hosts_path = $home."/Library/Application Support/appsolute/MAMP PRO/conf/httpd.conf";
$lineNumber = getLineWithString($mamp_hosts_path,$args);

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


?>
