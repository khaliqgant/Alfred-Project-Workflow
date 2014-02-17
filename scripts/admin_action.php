<?php

require_once('workflows.php');
$workflow = new Workflows();

$admin = $argv[1];
$admin = explode(" ",$admin);
$set = $admin[0];
$response = $admin[1];

$workflow->set($set,$response,'settings.plist');

?>
