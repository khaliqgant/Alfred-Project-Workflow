<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();

$search_term = $argv[1] ?: true;
$options = explode(" ",$search_term);

$admin = $options[0];
$set = isset($options[1]) ? $options[1] : FALSE;
$admin = arg_cleanup($admin,$set);

//get their working directory
$dir = $workflow->get('Directory','settings/settings.plist');

if ($search_term !== "set" && $admin !== "set")
{
    if ($handle = opendir($home."/".$dir)) {
        while (false !== ($project= readdir($handle))) {
            if ($project != "." && $project != ".." && $project !== ".DS_Store"
                && ($search_term === true ||
                    strpos(strtoupper($project),strtoupper($search_term)) !== false)
            ) {
                $icon_possible_path = $home."/".$dir."/".$project."/favicon.ico";
                //use the favicon if one there
                if (file_exists($icon_possible_path))
                {
                    $icon = $icon_possible_path;
                } else{
                    $icon = 'icon.png';
                }

                $path = $home."/".$dir."/".$project;
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
