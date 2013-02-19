<?php
include 'mysql_setup.php';

$sql = 'SELECT name, attending, adults, children, email
        FROM guest
        WHERE code = ?';

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $_GET['code']);

$stmt->execute();

$stmt->bind_result($name, $attending, $adults, $children, $email);

$stmt->fetch();

$result = array(
  'name' => $name,
  'attending' => $attending,
  'adults' => $adults,
  'children' => $children,
  'email' => $email,
  'code' => $_GET['code'],
);

echo(json_encode($result));
?>
