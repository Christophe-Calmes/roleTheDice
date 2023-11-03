<?php
include '../functions/functionToken.php';
$parametre = new Preparation();
$_POST['token'] = IntToken(16);
$param = $parametre->creationPrep($_POST);
$update = "UPDATE `users` SET `token`= :token, `valide`= :valide,`role`= :role WHERE `idUser` = :idUser";
ActionDB::access($update, $param);
header('location:../index.php?idNav='.$idNav.'&message=User modifier');
