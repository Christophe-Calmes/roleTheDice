<?php
// Créer la route
include '../functions/functionToken.php';
$_POST['route'] = IntToken(20);
/*$request = new RequestSQL([],'`routageForm`');
$insert = $request->requestInsert($_POST, 1);*/
$request = new InsertRequest();
$insert = $request->requestInsert($_POST, 1, 'routageForm');
print_r($insert);
$parametre = new Preparation();
$param = $parametre->creationPrep ($_POST);
ActionDB::access($insert, $param);
header('location:../index.php?idNav='.$idNav.'&message=Nouvelle route Formulaire entrée');
