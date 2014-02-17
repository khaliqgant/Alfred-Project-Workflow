<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();

$action = $argv[1];
$options = explode(" ",$action);

$admin = $options[0];
$set = $options[1];
$admin = arg_cleanup($admin,$set);

//get their working directory
$dir = $workflow->get('Directory','settings/settings.plist');

if ($action !== "set" && $admin !== "set")
{
    if ($handle = opendir($home."/".$dir)) {
        while (false !== ($project= readdir($handle))) {
            if ($project != "." && $project != ".." && $project !== ".DS_Store") {
                $icon_possible_path = $home."/".$dir."/".$project."/favicon.ico";
                //use the favicon if one there
                if (file_exists($icon_possible_path))
                {
                    $icon = $icon_possible_path;
                } else{
                    $icon = 'icon.png';
                }

                $path = $home."/".$dir."/".$project." ".$action;
                $workflow->result($project,$path,$project,$project,$icon);
            }
        }
        closedir($handle);
}

    echo $workflow->toxml();

}

/**
 * Strip spaces and remove other argument from the string
 * @param $arg1 - what you actually want
 * @param $arg2 - what you want to strip away
 * @return string
 */
function arg_cleanup($arg1,$arg2){
    $arg = str_replace(" ","",$arg1);
    $arg = str_replace($arg2,"",$arg1);

    return $arg;
}
