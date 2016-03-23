<?php

require_once("db.class.php");

$info = array();

$info['sender'] = '';
$info['message'] = $_REQUEST['message'];
$info['ondate'] = date("Y-m-d H:i:s");
$messages = $db->saveArray("messages", $info);

echo "<pre>";
print_r($messages);
