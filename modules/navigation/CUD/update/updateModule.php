<?php
if(filter($_POST['id']) == 1) {
  header('location:../index.php?idNav='.$idNav.'&message=Impossible de modifier le module graines');
} else {
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $select = "SELECT `valide` FROM `modules` WHERE `id` = :id";
  $valide = ActionDB::select($select, $param);
  if($valide[0]['valide'] == 0) {
    $update = "UPDATE `modules` SET `valide`= 1 WHERE `id`= :id;
    UPDATE `navigation` SET `valide` = 1 WHERE `idModule` = :id;
    UPDATE `routageForm` SET `valide`= 1 WHERE `idModule` = :id;
    ";
    ActionDB::access($update, $param);
  } else {
    $update = "UPDATE `modules` SET `valide`= 0 WHERE `id`= :id;
    UPDATE `navigation` SET `valide` = 0 WHERE `idModule` = :id;
    UPDATE `routageForm` SET `valide`= 0 WHERE `idModule` = :id;";
    ActionDB::access($update, $param);
  }
  header('location:../index.php?idNav='.$idNav.'&message=Module modifié');

}
