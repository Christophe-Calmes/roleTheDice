<?php
require '../modules/dataSite/objets/cudDataSite.php';
$sizeTable = [50, 120, 100, 750];
$postKey = array_keys($_POST);
for ($i=0; $i < count($postKey) ; $i++) {
array_push($controleForm, sizePost(filter($_POST[$postKey[$i]]), $sizeTable[$i]));
}
$qualiter = Qualiter($sizeTable);

if($qualiter == $controleForm) {
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $fields = [];
  $table = '`dataSite`';
  $conditionsClause = [['champs'=>'idDataSite', 'operator'=>'=', 'param'=>1]];
  $set = ['`titre`=:titre','`sousTitre`=:sousTitre','`description`=:description','`titreHTML`=:titreHTML'];
  $actionUpdate = new CUDdataSite ($fields, $table, $conditionsClause, $set);
  $actionUpdate->updateDataSite ($param, $_POST);
    header('location:../index.php?idNav='.$idNav.'&message=Update du site pris en compte');
} else {
  header('location:../index.php?idNav='.$idNav.'&message=Un des champs est trop long');
}
