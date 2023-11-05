<?php
  $yes = ['Non', 'Oui'];
  require 'modules/users/objets/getUser.php';
  require 'modules/users/objets/printUser.php';
  $roles = new PrintUser();
  $internaute = $roles->setRoles();
  $dataMenuDeroulant = $readNav->getMenuDeroulant();
?>
<h3>Ajouter un lien de navigation</h3>
<form class="formulaireClassique" action="<?php echo encodeRoutage(4); ?>" method="post">
  <label for="nomNav">Nom du lien</label>
  <input id="nomNav" type="text" name="nomNav" required>
  <label for="cheminNav">chemin du lien</label>
  <input id="cheminNav" type="text" name="cheminNav" required>
  <label for="menuVisible">Menu visible ?</label>
    <select id="menuVisible" name="menuVisible">
      <?php for ($i=0; $i < count($yes) ; $i++) {  echo '<option value="'.$i.'">'.$yes[$i].'</option>'; } ?>
    </select>
  <label for="ordre">Ordre d'apparition</label>
  <input id="ordre" type="number" name="ordre" min="0" max="20" required>
  <label for="niveau">Niveau d'acréditation</label>
    <select id="niveau" name="niveau">
      <?php foreach ($internaute as $key => $value) {
        echo '<option value="'.$value['role'].'">'.$value['name'].'</option>';
      } ?>
    </select>
      <?php
        $readNav->selectZoneMenu($dataMenuDeroulant);
        $readNav->menuDeroulant($dataMenuDeroulant);
        $readNav->modulesList();
      ?>
    <button class="buttonForm" type="submit" name="idNav" value="<?=$idNav?>">Ajouter</button>
</form>
<h3>Les menus</h3>
<?php
$internaute = array_reverse($internaute);
      foreach ($internaute as $key => $value) {
        echo '<h3>'.$value['name'].'</h3>';
        $dataNavBandeau = $readNav->getNav($value['role']);
        $readNav->bandeauHaut($dataNavBandeau);
      }
 ?>
