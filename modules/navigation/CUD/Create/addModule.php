<?php
//Encoderoutage 25
// Vérification des doublons
$sql = "SELECT `module` FROM `modules` WHERE `module` = :module";
$test = 'module';
if(($checkId->doublon($sql, $test , filter($_POST[$test])) == 0)){
  //$request = new RequestSQL([],'`modules`');
  //$insert = $request->requestInsert($_POST, 1);
  $request = new InsertRequest();
  $insert = $request->requestInsert($_POST, 1, 'modules');
  $parametre = new Preparation();
  $param = $parametre->creationPrep($_POST);
  ActionDB::access($insert, $param);
  header('location:../index.php?message=Nouveau module denregistré&idNav='.$idNav);
} else {
  header('location:../index.php?message=Module existant&idNav='.$idNav);
}
