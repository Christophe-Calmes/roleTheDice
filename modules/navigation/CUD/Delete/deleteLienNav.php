<?php
//encodeRoutage(21)
$delete = "DELETE FROM `navigation` WHERE `idNav` = :id;";
$parametre = new Preparation();
$param = $parametre->creationPrep ($_POST);
ActionDB::access($delete, $param);
header('location:../'.findTargetRoute(92));
