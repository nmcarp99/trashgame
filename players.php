<?php
echo json_encode(file('txt/'.$_COOKIE['game'].'players.txt')[0][0]);
?>
