<?php
include '../functions/functionToken.php';
//print_r($_POST);
//Contrôle de la qualité des informations en taille.
$sizeTable = [30, 80, 1, 3, 3, 5, 3, 3];
$postKey = array_keys($_POST);
for ($i=0; $i < count($postKey) ; $i++) {
array_push($controleForm, sizePost(filter($_POST[$postKey[$i]]), $sizeTable[$i]));
}
$qualite = array();
for ($i=0; $i < 9 ; $i++) {
  array_push($qualite, 0);
}
$_POST['targetRoute'] =  IntToken (16);
//Fin création token
if($controleForm == $qualite) {
  $request = new InsertRequest();
  $insert = $request->requestInsert($_POST, 1, 'navigation');
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  ActionDB::access($insert, $param);
  header('location:../index.php?message=Nouveau lien enregistré&idNav='.$idNav);
} else {
  header('location:../index.php?message=Soucis de traitement de votre formulaire');
}
