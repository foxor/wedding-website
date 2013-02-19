<?php
include 'mysql_setup.php';

$sql = 'UPDATE guest
        SET
        attending = ?,
        adults = ?,
        children = ?,
        email = ?,
        intentional = 1
        WHERE code = ?';

$stmt = $mysqli->prepare($sql);

$attending = ($_POST['attending'] == 'checked' ? '1' : '0');

$stmt->bind_param("sssss",
  $attending,
  $_POST['adults'],
  $_POST['children'],
  $_POST['email'],
  $_POST['code']
);

$stmt->execute();

echo(json_encode("ok"));

$stmt->close();

$mysqli->close();

?>
