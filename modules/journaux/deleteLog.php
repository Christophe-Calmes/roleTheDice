<?php
$idNav = filter($_POST['idNav']);
$requetteSQL = "TRUNCATE TABLE `journaux`";
ActionDB::access($requetteSQL, $prepare);
header('location:../index.php?idNav='.$idNav.'&message=Journeaux vidé.');
