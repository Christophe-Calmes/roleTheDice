<?php
function parametrePagination ($parPage, $requetteSQL, $param ) {
  $dataNbrC = ActionDB::select($requetteSQL, $param);
  $nbrArticle = $dataNbrC[0]['nbr'];
  // nombre de page total arrondit au chiffre suppérieur.
  return $pages = ceil($nbrArticle/$parPage);
}
function affichageData($requette, $param) {
  /*Modèle de requette
  $requetteSQL = 'SELECT  *
  FROM `armes`
  WHERE `armes`.`valide` = :valide
  ORDER BY `nomUnivers`, `nomFaction`, `armes`.`nom`
  LIMIT '.$premier.', '.$parPage.'';
  */
  return $dataTraiter = ActionDB::select($requette, $param);
}

function navPagination($pages, $idNav) {
  for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }
}

 ?>
