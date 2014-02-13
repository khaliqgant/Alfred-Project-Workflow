<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();
$icon = 'web.png';

$query = $argv[1];


if ($handle = opendir($home."/".$query)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry !== ".DS_Store") {
            //if ($handle = opendir($home."/".$query."/".$entry)){
                //while (false !== ($content = readdir($handle))) {
                    //if ($content != "." && $content != ".." && $content === "favicon.ico") {
                        //$icon = $content;
            //}
            $workflow->result($entry,$entry,$entry,$entry,$icon);
        }
    }
    closedir($handle);
}


//echo $workflow->result;

echo $workflow->toxml();

