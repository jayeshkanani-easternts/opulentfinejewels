<?php
header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$_POST['title'].'.csv"');
echo $_POST['filebody'];
?>