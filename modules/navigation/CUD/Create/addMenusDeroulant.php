<?php
include '../functions/functionToken.php';
array_push($controleForm, sizePost(filter($_POST['titreMenu']),80));
array_push($controleForm, sizePost(filter($_POST['niveau']),1));
array_push($controleForm, $checkId->controleInteger(filter($_POST['niveau'])));
$idModule = filter($_POST['idModule']);
unset($_POST['idModule']);
if ($controleForm == [0, 0, 0, true]) {
  $niveau = filter($_POST['niveau']);
  array_pop($_POST);
  // Création du nouveau menu déroulant
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);

  $request = new insertRequest();
  $insert = $request->requestInsert($_POST, 0, 'menuNav');
  ActionDB::access($insert, $param);
  // Création du menu déroulant dans la table navigation
  // Construction de la valeur déroulant Recherche de l'id du dernière enregistrement
  $requestSelect = new SelectRequest(['idMenuDeroulant'], 'menuNav');
  $select = $requestSelect->requestSelect(1, '`idMenuDeroulant`', 1);
  $lastId = ActionDB::select($select, []);
  // Construction du nouveau $_POST
    $nomNav = $_POST['titreMenu'];
    $_POST = array();
    $_POST['nomNav'] = $nomNav;
    $_POST['cheminNav'] = 'modules/navigation/erreurNav.php';
    $_POST['menuVisible'] = 1;
    $_POST['zoneMenu'] = 0;
    $_POST['ordre'] = 0;
    $_POST['niveau'] = $niveau;
    $_POST['deroulant'] = $lastId[0]['idMenuDeroulant'];
    $_POST['targetRoute'] =  genToken (16);
    $_POST['idModule'] = $idModule;
    // Création du tableau $param pour enregistrement dans navigation
    $insert = $request->requestInsert($_POST, 1, 'navigation');
    $parametre = new Preparation();
    $param = $parametre->creationPrep ($_POST);
    ActionDB::access($insert, $param);
    header('location:../index.php?message=Nouveau menu déroulant enregistré&idNav='.$idNav);
} else {
  header('location:../index.php?message=Menu déroulant trop long&idNav='.$idNav);
}
