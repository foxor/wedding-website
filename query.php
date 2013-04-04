<?php
include 'mysql_setup.php';

$sql = 'SELECT name, attendingYes, attendingNo, adults, children, email
        FROM guest
        WHERE code = ?';

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $_GET['code']);

$stmt->execute();

$stmt->bind_result($name, $attendingYes, $attendingNo, $adults, $children, $email);

$stmt->fetch();

$result = array(
  'name' => $name,
  'attendingYes' => $attendingYes,
  'attendingNo' => $attendingNo,
  'adults' => $adults,
  'children' => $children,
  'email' => $email,
  'code' => $_GET['code'],
);

echo(json_encode($result));
?>
