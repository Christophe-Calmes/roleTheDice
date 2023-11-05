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
  public function getRoles($valide = 1) {
    $sql = new SelectRequest (['typeRole', 'accreditation'], 'roles', [['champs'=>'valide', 'operator'=>'=', 'param'=>$valide]]);
    $select = $sql->requestSelect(0);
    return ActionDB::select($select, []);
  }
}
