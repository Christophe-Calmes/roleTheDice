<?php
/*
Class SelectRequest pour toute les requêtes Select
*/
class SelectRequest {
    private array $fields;
    // Exemple $fiels = ['champs1', 'champs2'];
    private string $tables;
    private array $conditionsClause;
    //Exemple $condition = [['champs'=>'idDataSite', 'operator'=>'=', 'param'=>1]];
    private array $set;
    //Exemple $set = ['`champs`=:champs'];

    public function __construct($fields = [], $tables = '', $conditionsClause =[], $set = []) {
        $this->fields = $fields;
        $this->tables = $tables;
        $this->conditionsClause = $conditionsClause;
        $this->set = $set;
    }

    private function constructFields() {
        $fields = '';
        for ($i = 0; $i < count($this->fields); $i++) {
            $fields .= '`'. $this->fields[$i] .'`,';
        }
        $fields = substr($fields, 0, -1);
        return $fields;
    }

    private function constructCondition() {
        $conditionsClause = '';
        foreach ($this->conditionsClause as $key => $value) {
          $conditionsClause .= '`'.$value['champs'].'`'.$value['operator'].$value['param'].' AND ';
        }
        return $conditionsClause = substr($conditionsClause, 0, -4);
    }
    private function constructSet() {
      $listSet = '';
      for ($i=0; $i <count($this->set) ; $i++) {
        $listSet .= $this->set[$i].', ';
      }
      return $listSet = substr($listSet, 0, -2);
    }
    public function requestSelect($type = 0, $orderBy = '', $limit = 0) {
        $fields = $this->constructFields();
        $conditions = $this->constructCondition();
        switch ($type) {
          case 0:
            $sql = 'SELECT ' . $fields . ' FROM ' . '`'.$this->tables.'` WHERE ' . $conditions;
            break;
          case 1:
            $sql = 'SELECT ' . $fields . ' FROM ' . '`'.$this->tables.'` ORDER BY '.$orderBy.' DESC LIMIT '.$limit;
            break;
          default :
            $sql = 'SELECT ' . $fields . ' FROM ' . '`'.$this->tables.'` WHERE ' . $conditions;

            break;
        }
        return $sql;
    }
    function __destruct() {
    }
}

/*
Class InsertRequest pour toute les requêtes Insert
*/

Class InsertRequest {
  public function requestInsert($post, $secure, $table) {
    $this->tables = $table;
    // $secure == nombre de champs maximum différent entre les attendus et ceux valides
    // Extraction des champs
    $security = false;
    $sql = 'DESCRIBE '.$this->tables;
    $tableFields = ActionDB::select($sql, []);
    $controlFields = array();
    foreach ($tableFields as $key => $value) {
      array_push($controlFields, $value['Field']);
    }
    array_shift($controlFields);
    // Suppression de idChamps
    // Creat fields
    $fields = '';
    $buffer = array();
    foreach ($post as $key => $value) {
      $fields .= '`'.$key.'`,';
      array_push($buffer, $key);
    }
    //print_r($buffer);
    if(count(array_diff($controlFields, $buffer)) == $secure) {
      $security = true;
    }
    if($security) {
      $fields = substr($fields, 0, -1);
      //print_r($fields);
      // Creat values
      $values = '';
      for ($i=0; $i <count($buffer) ; $i++) {
        $values .= ':'.$buffer[$i].', ';
      }
      $values = substr($values,0, -2);
      //print_r($values);

      $sql = 'INSERT INTO `'.$this->tables.'`('.$fields.') VALUES ('.$values.')';
      return $sql;
    } else {
      //print_r($security);
      header('location:../index.php');
    }

  }
  function __destruct() {
  }
}
/*
Class UpdateRequest pour toute les requêtes Update
$table = 'nomTable';
$set = $_POST;
$condition = [['champs'=>'nomChamps', 'operator'=>'= | > | < | >= | <= ', 'target'=>'target']];

*/
Class UpdateRequest {
  private function traitementPost($set) {
    $arraySet = array();
    $listeSet = NULL;
    foreach ($set as $key => $value) {
      array_push($arraySet, $key);
    }
    for ($i=0; $i <count($arraySet) ; $i++) {
      $listSet .= '`'.$arraySet[$i].'`=:'.$arraySet[$i].', ';
    }
    return substr($listSet, 0, -2);
  }
  private function security($table, $set, $secure) {
    $controlFields = array();
    $fieldsPost = array();
    //  $secure = nombre de champs exclus de l'update
    $this->tables = $table;
    // Extraction des champs
    $sql = 'DESCRIBE '.$this->tables;
    $tableFields = ActionDB::select($sql, []);

    foreach ($tableFields as $key => $value) {
      array_push($controlFields, $value['Field']);
    }
    foreach ($set as $key => $value) {
      array_push($fieldsPost, $key);
    }
    if(count(array_diff($controlFields, $fieldsPost)) == $secure) {
      return true;
    } else {
      return false;
    }

  }
  private function traitementCondition($condition) {
    $conditions = NULL;
    foreach ($condition as $key => $value) {
      $conditions .= '`'.$value['champs'].'`'.$value['operator'].$value['target'].'AND ';
    }
    return substr($conditions,0, -4);
  }


  public function requestUpdate($table, $set, $condition, $secure) {
    if($this->security($table, $set, $secure)) {
      $listSet = $this->traitementPost($set);
      $conditions = $this->traitementCondition($condition);
      $sql = 'UPDATE `'.$table.'` SET '.$listSet.' WHERE '.$conditions;
      return $sql;
    } else {
      header('location:../index.php');
    }

  }
}

/*
Delete
$condition = [['champs'=>'nomChamps', 'operator'=>'> | < | =', 'target'=>'target']];
*/

Class requestDelete {
  private function traitementCondition($condition) {
    $conditions = NULL;
    foreach ($condition as $key => $value) {
      $conditions .= '`'.$value['champs'].'`'.$value['operator'].$value['target'].'AND ';
    }
    return substr($conditions,0, -4);
  }
  public function delete($condition, $table) {
      $condition = $this->traitementCondition($condition);
      return 'DELETE FROM `'.$table.'` WHERE '.$condition.';';
  }
}
