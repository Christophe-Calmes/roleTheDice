<?php
  require 'modules/users/objets/getUser.php';
  require 'modules/users/objets/printUser.php';
  $roles = new PrintUser();
  $internaute = $roles->setRoles();
  $dataRouteForm = new  PrintNavigation();
?>
<h3>Ajouter une route pour un formulaire</h3>
<?php if($dev) { ?>
<form class="formulaireClassique" action="<?=encodeRoutage(7)?>" method="post">
  <label for="chemin">Le chemin du traitement du formulaire</label>
  <input id="chemin" type="text" name="chemin" required>
  <label for="securiter">Niveau d'administration du formulaire</label>
  <select id="securiter"  name="securiter">
    <?php foreach ($internaute as $key => $value) {
      echo '<option value="'.$value['role'].'">'.$value['name'].'</option>';
    } ?>
  </select>
  <?php $readNav->modulesList(); ?>
  <button class="buttonForm" type="submit" name="idNav" value="<?=$idNav?>">Ajouter</button>
</form>
<?php $dataTraiter = $dataRouteForm->toutesRoutesForm();
      $dataRouteForm->listeRouteForm($dataTraiter, $internaute);

 ?>
<?php } else { echo "Menu indisponible en production";} ?>

<form class="formulaireClassique" action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
  <h3>Brassage routes des formulaires</h3>
<button type="submit" name="button">Changer les serrures</button>
</form>
<?php
function doublon ($select) {
  $doublon = ActionDB::select($select, []);
  if(!empty($doublon)) {
    echo '<p>Doublon détecté dans le clés. Changer le trousseau.</p>';
    echo '<ul>';
    foreach ($doublon as $key => $value) {
      echo '<li>nombre de doublon :'.$value['nbr_doublon'].' Doublon pointé :'.$value['routageToken'].'</li>';
    }
    echo'</ul>';
  } else {
    echo '<p>Série de clés sans doublon.</p>';
  }
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  require 'functions/functionToken.php';
  $select = "SELECT `idForm`, `route` FROM `routageForm` WHERE `valide` = 1";
  $listeIdNav = ActionDB::select($select, []);
    foreach ($listeIdNav as $key => $value) {
      $update = "UPDATE `routageForm` SET `route`= :route WHERE `idForm` = :idForm";
      $param = [['prep'=>':route', 'variable'=>IntToken(rand(14,20))], ['prep'=>':idForm', 'variable'=>$value['idForm']]];
      ActionDB::access($update, $param);
    }
  echo '<p>Serie de clé de routage interne modifié.</p>';
  $select = "SELECT COUNT(`targetRoute`) AS `nbr_doublon`, `targetRoute` FROM `navigation` GROUP BY `targetRoute` HAVING COUNT(`targetRoute`) > 1";
  doublon($select);
}
 ?>
