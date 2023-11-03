<?php
class GetDataSite {

    public function getElementSite($fields, $tables, $conditionsClause) {
        $sql = new SelectRequest($fields, $tables, $conditionsClause);
        $select = $sql->requestSelect(0, '', 0);
        return ActionDB::select($select, []);
    }
}
