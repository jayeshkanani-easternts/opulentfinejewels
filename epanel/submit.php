<?php
session_start();

$_SESSION['from'] = $_REQUEST['from'];

$_SESSION['to'] = $_REQUEST['to'];

//echo $_SESSION['from'];

//echo $_SESSION['to'];

?>

<script>
location.href = 'index.php?controller=analytics&action=dashboard&subaction=listData';
</script>