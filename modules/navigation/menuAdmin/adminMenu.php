<?php
  require 'modules/users/objets/getUser.php';
  require 'modules/users/objets/printUser.php';
  $roles = new PrintUser();
  $internaute = $roles->setRoles();
  // instensiation de PrintNavigation
  $adminNavigation = new PrintNavigation();
  $adminNavigation->affichageAllNav();
