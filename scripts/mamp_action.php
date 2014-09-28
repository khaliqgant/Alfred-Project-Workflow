<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();

$args = $argv[1];
$args = explode(" ",$args);
$flags = array("-v","-t","-f");
if (!array_intersect($flags,$args)){

    $args = $args[0];

    $args = str_replace(" ","",$args);

    $mamp_hosts_path = $home."/Library/Application Support/appsolute/MAMP PRO/httpd.conf";
    if (file_exists($mamp_hosts_path))
    {
        $lines = file($mamp_hosts_path);
        $lineNumber = getLineWithString($mamp_hosts_path,$args,$lines);
        $lineLimit = $lineNumber - 4;
        $serverLine = lineRange($lineNumber,$lineLimit,$lines);
        $server = str_replace("ServerName ","",$serverLine);
        $server = trim($server);
        if ($server){
            shell_exec("open http://$server");
        }
    }
}

function getLineWithString($fileName, $str, $lines) {
    //http://stackoverflow.com/questions/9721952/search-string-and-return-line-php
    foreach ($lines as $lineNumber => $line) {
        if (strpos($line, $str) !== false) {
            return $lineNumber;
        }
    }
    return -1;
}

function grabLine($fileName,$Dline, $lines){
    foreach ($lines as $lineNumber => $line){
        if ($lineNumber == $Dline){
            return $line;
        }
    }
}

/**
 * Given a range of numbers, find a particular string within that range
 * @return string
 */
function lineRange($line,$lineLimit,$lines){
    while ($line != $lineLimit)
    {
        $ranges[] = $lines[$line];
        $line--;
    }
    foreach ($ranges as $range){
        if (strpos($range, "ServerName") !== false) {
            return trim($range);
        }

    }

}



?>
