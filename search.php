<?php

require_once('workflows.php');
$workflow = new Workflows();
$home = $workflow->home();

$query = $argv[1];

$args = explode(" ",$query);
$file_path = $args[0];
$action = $args[1];


if ($file_path === ">"){
    //set the possible admin actions
    $admin_actions = admin();

    foreach ($admin_actions as $admin=>$info){
        $explanation = $info['explanation'];
        $icon = $info['icon'];
        $workflow->result($admin,$admin,$explanation,$admin,$icon);
    }
    echo $workflow->toxml();
}




$file_path = str_replace(" ","",$file_path);
$file_path = str_replace($action,"",$file_path);

$action = str_replace(" ","",$action);
$action = str_replace($file_path,"",$action);


if ($handle = opendir($home."/".$file_path)) {
    while (false !== ($project= readdir($handle))) {
        if ($project != "." && $project != ".." && $project !== ".DS_Store") {
            $icon_possible_path = $home."/".$file_path."/".$project."/favicon.ico";
            //use the favicon if one there
            if (file_exists($icon_possible_path))
            {
                $icon = $icon_possible_path;
            } else{
                $icon = 'assets/icon.png';
            }

            $path = $home."/".$file_path."/".$project." ".$action;
            $workflow->result($project,$path,$project,$project,$icon);
        }
    }
    closedir($handle);
}


echo $workflow->toxml();


function admin(){
    return array(
        'Directory' => array('explanation' => 'Set the Director Folder where you work from',
                        'icon' => 'assets/directory.png'
                    ),
        'IDE'       => array('explanation' => 'Set the IDE you work with',
                        'icon' => 'assets/ide.png'
                    )
    );
}
