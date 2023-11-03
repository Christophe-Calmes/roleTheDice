<?php
include '../functions/functionToken.php';
// Security tests
$security = array();
$stamp = array();
$test = false;
if((filter($_POST['mpdA']) == filter($_POST['mdp']))){
  array_push($security, 0);
} else {
  array_push($security, 1);
}
if(strlen(filter($_POST['mpdA']))>9) {
  array_push($security, 0);
} else {
  array_push($security, 1);
}
$elements = [['post'=>'email', 'size'=>80], ['post'=>'prenom', 'size'=>60], ['post'=>'nom', 'size'=>60], ['post'=>'login', 'size'=>60], ['post'=>'mdp', 'size'=>120]];
foreach ($elements as $key => $value) {
    array_push($security,sizePost(filter($_POST[$value['post']]), $value['size']));
}
// Check doublons
$controle = new Controles();
$arrayDoublon = [['sql'=>"SELECT`email`FROM `users` WHERE `email` = :email", 'preparation'=>':email', 'valeur'=>filter($_POST['email'])],
['sql'=>"SELECT`login`FROM `users` WHERE `login` = :login", 'preparation'=>':login', 'valeur'=>filter($_POST['login'])]];
foreach ($arrayDoublon as $key => $value) {
  array_push($security, $controle->doublon($value['sql'], $value['preparation'] , $value['valeur']));
}
for ($i=0; $i <count($security); $i++) {
  array_push($stamp, 0);
}
if($security === $stamp) {
  // Instruction de traitement de $_POST
  $test = true;
  array_pop($_POST);
  unset($_POST['mpdA']);
  $_POST['mdp'] = haschage(filter($_POST['mdp']));
  $_POST['token'] = genToken(16);
}
if($test) {
  //print_r($_POST);
  $sql = new InsertRequest();
  $insert = $sql->requestInsert($_POST, 3, 'users');
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  ActionDB::access($insert, $param);
  header('location:../index.php?message=Vous avez reçus un mail pour confirmer votre inscription&idNav='.$idNav);
} else {
  header('location:../index.php?message=Soucis de traitement');
}
