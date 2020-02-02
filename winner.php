<?php
echo json_encode(count(file("txt/".$_COOKIE['game']."discard.txt")));
?>
