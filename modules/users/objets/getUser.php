<?php
Class GetUser {
  public function getUserCurrentPage($premier, $parPage, $valide) {
    $select = "SELECT `idUser`, `login`, `role`, `dateCreation`, `valide` FROM `users` WHERE `valide`  = :valide ORDER BY `login` LIMIT {$premier}, {$parPage}";
    $param = [['prep'=>':valide', 'variable'=>$valide]];
    return ActionDB::select($select, $param);
  }
  public function getProfil($token) {
    $select = "SELECT `token`, `email`, `prenom`, `nom`, `login`,`role`, `dateCreation`
    FROM `users`
    WHERE `token` = :token";
    $param = [['prep'=>':token', 'variable'=>$token]];
    return ActionDB::select($select, $param);
  }
  public function getRoles() {
    $select = "SELECT `idRole`, `typeRole` FROM `roles`";
    return ActionDB::select($select, []);
  }
}
