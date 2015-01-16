<?php

require_once('workflows.php');
$workflow = new Workflows();

$args = $argv[1];
$args = explode(" ",$args);
$ide = $workflow->get('IDE','settings/settings.plist');

$file_path = $args[0];

switch ($ide)
{
    case "Sublime":
        shell_exec("subl $file_path");
        break;
    case "Macvim":
        shell_exec("open -a $ide $file_path");
    break;
}


?>
