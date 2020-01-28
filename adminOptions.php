<?php
if ($_GET['username'] == "pi" and $_GET['password'] == "Mf\$iYGLaBN1799") {
    $files = glob("txt/*");
    foreach($files as $file) {
        unlink($file);
    }
    $output = "<p>You deleted ".count($files)." items: </p>";
    foreach($files as $file) {
        $output .= "<p>Deleted ".$file."</p>";
    }
    echo json_encode($output);
}
?>