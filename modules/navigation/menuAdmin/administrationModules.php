<?php
if($dev) {
  $form = [['name'=>'module', 'message'=>'Nouveau module', 'type'=>0]];
  echo '<div class="objetLeft">
  <button type="button" id="magic" class="open">Ouvrir le formulaire</button>
  </div>
  <div id="hiddenForm">';
  formAction(25, $form, $idNav, 'Ajouter');
  echo '</div>';
    $adminNavigation = new PrintNavigation();
    $adminNavigation->displayModulesList($idNav);
    require 'javaScript/magicButton.php';
}
