<?php
class ActionDB {
  // Element system
  public static function select ($SQL, $Param, $type = 0) {
    $read = new RCUD($SQL, $Param);
    return $read->READ($type);
  }
  public static function access ($SQL, $Param, $type = 0) {
    $action = new RCUD($SQL, $Param);
    $action->CUD($type);
  }
}
