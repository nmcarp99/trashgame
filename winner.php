<?php
if (file("txt/".$_COOKIE['game']."players.txt")[0] == "1") {
	echo json_encode(count(file("txt/".$_COOKIE['game']."discard.txt")));
} else {
	echo json_encode("!1player");
}
?>
