<?php
class CUDdataSite {
  public function updateDataSite ($param, $set) {
    $request = new UpdateRequest ();
    $update = $request->requestUpdate('dataSite', $set, [['champs'=>'idDataSite', 'operator'=>'=', 'target'=>1]], 1);
    ActionDB::access ($update, $param);
  }
}
