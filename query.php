<?php
include 'mysql_setup.php';

$sql = 'SELECT name, attending, members
        FROM guest
        WHERE code = ?';

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $_GET['code']);

$stmt->execute();

$stmt->bind_result($name, $attending, $members);

$stmt->fetch();

$result = array(
  'name' => $name,
  'attending' => $attending,
  'members' => $members
);

echo(json_encode($result));
?>
