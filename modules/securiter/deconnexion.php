<?php
  // Réinitialisation du token
  require 'functions/functionToken.php';

  $id = new Controles();

  $update = "UPDATE `users` SET `token` = :token WHERE `idUser` = :idUser;";
  $param =  [['prep'=>':idUser', 'variable'=>$id->idUser($_SESSION)],
              ['prep'=>':token', 'variable'=>genToken(10)]];
  //print_r($param);
  ActionDB::access($update, $param);
  session_destroy();
  $_SESSION = array();
  // En ligne
  //header('location: https://rtd.graines1901.com/');
  // En local
  header('location:index.php?message=Vous êtes déconnecté');
