<?php
// routeForm(29)
$security = array();
array_push($security, sizePost(filter($_POST['typeRole']), 15));
if($security == [0]) {
  $sql = new SelectRequest (['accreditation'], 'roles');
  $select = $sql->requestSelect(1, '`accreditation`', 1);
  $data = ActionDB::select($select, []);
  $_POST['accreditation'] = $data[0]['accreditation'] + 1;
  $sql = new InsertRequest ();
  $insert = $sql->requestInsert($_POST, 1, 'roles');
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  ActionDB::access($insert, $param);
  header('location:../index.php?message=Nouveau rôle créé.&idNav='.$idNav);
} else {
  header('location:../index.php');
}
