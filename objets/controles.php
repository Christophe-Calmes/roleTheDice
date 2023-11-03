<?php
class Controles {
  public function doublon($sql, $preparation , $valeur) {
    /* $sql doit être une requette sql, $préparation doit prendre
    la forme :preparation et $valeur c'est la valeur du doublon à tester.*/
    $param = $param = [['prep'=>$preparation, 'variable'=>$valeur]];
    $test = ActionDB::select($sql, $param);
    $preparation = trim($preparation, ':');
    if(empty($test[0][$preparation])) {
      return 0;
    } else {
      return 1;
    }
  }
  public function idUser($session) {
    $param = [['prep'=>':token', 'variable'=>$session['tokenConnexion']]];
    $select = "SELECT `idUser` FROM `users` WHERE `token` = :token AND `valide` = 1 ";
    $idUser = ActionDB::select($select, $param);
    return $idUser[0]['idUser'];
  }
  public function controleInteger($data) {
    $valueOption = intval($data);
    if(is_integer($valueOption)) {
      return true;
    } else {
      return false;
    }
  }
  public function controleIntegerPK($data) {

    $pk = intval($data);
    print_r($data);
    print_r($pk);
    if($pk != 0) {
      return true;
    } else {
      return false;
    }
  }
  function __destruct() {
  }

}
