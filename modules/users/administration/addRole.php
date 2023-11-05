<?php
require 'modules/users/objets/getUser.php';
require 'modules/users/objets/printUser.php';
$form = [['name'=>'typeRole', 'message'=>'Nouveau role', 'type'=>0]];
echo '<div class="objetLeft">
<button type="button" id="magic" class="open">Ouvrir le formulaire</button>
</div>
<div id="hiddenForm">';
  formAction(29, $form, $idNav, 'Ajouter role');
echo'</div>';

  $printForm = new PrintUser();
  $printForm->printRoles(1);
  $printForm->printRoles(0);
  require 'javaScript/magicButton.php';
