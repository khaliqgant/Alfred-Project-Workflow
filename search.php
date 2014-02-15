<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();
$icon = 'web.png';

$query = $argv[1];
$args = explode(" ",$query);
$file_path = $args[0];
$action = $args[1];

$file_path = str_replace(" ","",$file_path);
$file_path = str_replace($action,"",$file_path);

$action = str_replace(" ","",$action);
$action = str_replace($file_path,"",$action);



if ($handle = opendir($home."/".$file_path)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && $file !== ".DS_Store") {
            //if ($handle = opendir($home."/".$query."/".$file)){
                //while (false !== ($content = readdir($handle))) {
                    //if ($content != "." && $content != ".." && $content === "favicon.ico") {
                        //$icon = $content;
            //}
            $path = $home."/".$file_path."/".$file." ".$action;
            $workflow->result($file,$path,$file,$file,$icon);
        }
    }
    closedir($handle);
}


echo $workflow->toxml();

