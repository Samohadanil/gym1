<?php

require_once 'gym.php';

$delete = $db->prepare("DELETE FROM users WHERE `id` = " . $_POST['row_id']);
$delete->execute();

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");
exit();
