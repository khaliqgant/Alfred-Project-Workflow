<?php

require_once('workflows.php');
$workflow = new Workflows();

$args = $argv[1];
$args = explode(" ",$args);
$ide = $workflow->get('IDE','settings.plist');

$file_path = $args[0];
$action = $args[1];
if ($action !== "*" || $action !== ".")
{
    $action = "/".$action;
} else{
    $action = " ".$action;
}
shell_exec("open -a $ide $file_path$action");


?>
