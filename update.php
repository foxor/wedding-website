<?php
include 'mysql_setup.php';

$sql = 'UPDATE guest
        SET ? = ?
        WHERE code = ?';

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $_POST['field']);
$stmt->bind_param("s", $_POST['value']);
$stmt->bind_param("s", $_POST['code']);

$stmt->execute();

echo(json_encode("ok"));
?>
