<?php
  $fields = ['titre', 'sousTitre', 'description', 'titreHTML'];
  $table = 'dataSite';
  $condition = [['champs'=>'idDataSite', 'operator'=>'=', 'param'=>1]];
  $InfoSite = new PrintDataSite();
  $InfoSite->formDataSite ($idNav, $fields, $table, $condition) ;
