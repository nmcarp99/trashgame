<?php
$response = array();
$response[] = intval($_COOKIE['player']);
$response[] = (intval(substr(file('txt/'.$_COOKIE['game'].'turn.txt')[0], 0, 1)) % intval(substr(file('txt/'.$_COOKIE['game'].'players.txt')[0], 0, 1))) + 1;
echo json_encode($response);
?>
