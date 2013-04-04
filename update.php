<?php
include 'mysql_setup.php';

$sql = 'UPDATE guest
        SET
        attendingYes = ?,
        attendingNo = ?,
        adults = ?,
        children = ?,
        email = ?,
        intentional = 1
        WHERE code = ?';

$stmt = $mysqli->prepare($sql);

$attendingYes = ($_POST['attendingYes'] == 'checked' ? '1' : '0');
$attendingNo = ($_POST['attendingYes'] == 'checked' ? '0' : '1');

$stmt->bind_param("ssssss",
  $attendingYes,
  $attendingNo,
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
