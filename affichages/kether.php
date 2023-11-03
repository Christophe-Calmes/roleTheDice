<?php
require 'modules/dataSite/objets/getDataSite.php';
require 'modules/dataSite/objets/printDataSite.php';
$fields = ['titre', 'sousTitre', 'description', 'titreHTML'];
$table = 'dataSite';
$condition = [['champs'=>'idDataSite', 'operator'=>'=', 'param'=>1]];
$dataSite = new PrintDataSite();
$dataSiteDB = $dataSite->getElementSite($fields, $table, $condition);
$title = $dataSiteDB[0]['titre'];
$title2 = $dataSiteDB[0]['sousTitre'];
$description = $dataSiteDB[0]['description'];
$titleHeader = $dataSiteDB[0]['titreHTML'];
