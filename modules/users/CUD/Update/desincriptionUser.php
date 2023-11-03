<?php
// encodeRoutage(22)
$update = "UPDATE `users` SET `valide` = 0 WHERE `idUser` = :idUser";
$param = [['prep'=>':idUser', 'variable'=>$checkId->idUser($_SESSION)]];
ActionDB::access($update, $param);
if($_SESSION['role'] >1) {
  $idNav = 75;
} else {
  $idNav = 74;
}
  header('location:../'.findTargetRoute($idNav));
