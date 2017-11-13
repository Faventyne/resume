<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
require_once __DIR__ .'/../inc/config.php';

$sql="SELECT * FROM experience
LEFT OUTER JOIN user ON experience.user_usr_id = user.usr_id
WHERE user_usr_id =".$_SESSION['id'] ;
print_r($sql);
$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute();
$user=$pdoStatement->fetch(PDO::FETCH_ASSOC);
print_r($user);
require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/profile.php';
require_once __DIR__ .'/../view/footer.php';

?>
