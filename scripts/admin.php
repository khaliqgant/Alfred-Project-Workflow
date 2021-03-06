<?php

require_once('workflows.php');
$workflow = new Workflows();

$query = $argv[1];
$args = explode(" ",$query);
$response = $args[0];

//set the possible admin actions
$admin_actions = admin();

foreach ($admin_actions as $admin=>$info){
    $explanation = $info['explanation'];
    $icon = $info['icon'];
    $workflow->result($admin,$admin." ".$response,$explanation,$admin,$icon);
}
echo $workflow->toxml();

/**
 * Sends admin actions
 * @return array
 */
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


?>
