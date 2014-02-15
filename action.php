<?php

$args = $argv[1];
$args = explode(" ",$args);
//add ability to specify other apps, like Sublime

$file_path = $args[0];
$action = $args[1];
if ($action !== "*")
{
    $action = "/".$action;
} else{
    $action = " ".$action;
}
shell_exec("open -a Macvim $file_path$action");


?>
