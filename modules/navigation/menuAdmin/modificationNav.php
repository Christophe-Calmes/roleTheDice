<?php
require 'modules/users/objets/getUser.php';
$id = filter($_GET['id']);
$readNav->updateNav($id, $idNav);
