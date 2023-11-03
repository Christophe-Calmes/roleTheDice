<?php
Class GetNavigation {

  protected function AuthenticNav ($value) {
    $select = "SELECT `idNav`, `nomNav`, `cheminNav`, `menuVisible`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`
    FROM `navigation`
    WHERE `zoneMenu` = :zoneMenu AND `niveau` = :niveau AND `valide` = 1";
    $param = [
    ['prep'=>':zoneMenu', 'variable'=>$value['deroulant']],
    ['prep'=>':niveau', 'variable'=>$value['niveau']]];
    return ActionDB::select($select, $param);
  }

  public function getNav($zoneMenu) {
    $select = "SELECT `nomNav`, `cheminNav`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`
    FROM `navigation`
    WHERE `valide` = 1 AND `niveau` = :niveau AND `menuVisible` = 1 AND `zoneMenu` = 0
    ORDER BY `ordre`";
    $param = [['prep'=>':niveau', 'variable'=>$zoneMenu]];
    return ActionDB::select($select, $param);
  }
  public function getContenus($idNav) {
    $select = "SELECT  `cheminNav`,  `niveau`, `targetRoute` FROM `navigation` WHERE `targetRoute` = :targetRoute AND  `valide` = 1";
    $param = [['prep'=>':targetRoute', 'variable'=>$idNav]];
    return ActionDB::select($select, $param);

  }
  public function getFrom($idRoute) {
    $select = "SELECT `chemin`, `securiter` FROM `routageForm` WHERE `valide` = 1 AND `route` = :route";
    $param = [['prep'=>':route', 'variable'=>$idRoute]];
    return ActionDB::select($select, $param);

  }
  public function getMenuDeroulant() {
    $select = "SELECT `idMenuDeroulant`, `titreMenu` FROM `menuNav`";
    return ActionDB::select($select, []);

  }
  public function toutesRoutesForm() {
      $select = "SELECT `idForm`, `chemin`, `securiter` FROM `routageForm` WHERE `valide` = 1 ORDER BY `securiter` DESC, `idForm`";
      return ActionDB::select($select, []);
  }
  protected function getAllNav() {
    $select = "SELECT `idNav`, `nomNav`, `cheminNav`, `menuVisible`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`
    FROM `navigation`;
    ORDER BY `niveau` AND `nomNav`";
    return ActionDB::select($select, []);

  }
  protected function getNavParam($id) {
    $select = "SELECT `idNav`, `nomNav`, `cheminNav`, `menuVisible`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`
    FROM `navigation`
    WHERE `idNav` = :idNav;";
    $param = [['prep'=>':idNav', 'variable'=>$id]];
    return ActionDB::select($select, $param);
  }
  protected function getModules($valide = 1) {
    $select = "SELECT `id`, `module`, `valide` FROM `modules` WHERE `valide` = :valide";
    $param = [['prep'=>':valide', 'variable'=>$valide]];
    return ActionDB::select($select, $param);
  }
}
