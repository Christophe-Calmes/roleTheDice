<?php
Class PrintUser extends GetUser{
private $role;
private $yes;
  public function __construct() {
    $ROLES = $this->getRoles();
    //print_r($ROLES);
    $roles = array();
    foreach ($ROLES as $key => $value) {
      array_push($roles, ['name'=>$value['typeRole'], 'role'=>$value['accreditation']]);
    }
    $this->role = $roles;
    $this->yes = ['Non', 'Oui'];
  }
  public function setRoles () {
    return $this->role;
  }
  public  function userTable ($variable, $idNav) {
    if ($variable == []) {
      echo '<p>Pas de données</p>';
    } else {
    echo '<div class="flex-rows">
            <table>';
      echo '<tr>
            <th>Login</th>
            <th>Date d\'inscription</th>
            <th>Modifier</th>
          </tr>';
          //print_r($variable);
          //  print_r($this->role);
          foreach ($variable as $key => $value) {
            echo '<tr>
                    <td>'.$value['login'].'</td>
                    <td>'.brassageDate($value['dateCreation']).'</td>
                    <td>
                      <form action="'.encodeRoutage(14).'" method="post">
                        <label for="valide">Valider</label>
                        <select  id="valide" name="valide">';
                        for ($i=0; $i < count($this->yes) ; $i++) {
                          if($value['valide'] == $i) {
                            echo '<option value="'.$i.'" selected>'.$this->yes[$value['valide']].'</option>';
                          } else {
                            echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
                          }
                        }
                        echo'</select>
                        <label for="role">Niveau d\'accréditation</label>
                        <select id="role" name="role">';
                          foreach ($this->role as $keyRole => $valueRole) {
                            if($valueRole['role'] == $value['role']) {
                              echo '<option value="'.$valueRole['role'].'" selected>'.$valueRole['name'].'</option>';
                            } else {
                              echo '<option value="'.$valueRole['role'].'">'.$valueRole['name'].'</option>';
                            }
                          }

                        echo'</select>
                        <input type="hidden" name="idUser" value="'.$value['idUser'].'" />
                        <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Modifier</button>
                      </form>
                    </td>
                  </tr>';
          }
    echo '</table>
    </div>';}
  }
  public function printProfilUser ($variable) {
    echo '<ul class="listeProfil">';
      echo '<li><h4>Votre profil</h4></li>';
      foreach ($variable as $key => $value) {
        echo '<li>Identité : '.$value['prenom'].' '.$value['nom'].'</li>';
        echo '<li>Pseudo : '.$value['login'].'</li>';
        echo '<li>Role : '.$this->role[$value['role']]['name'].'</li>';
        echo '<li>Date d\'inscription : '.brassageDate($value['dateCreation']).'</li>';
      }
    echo '</ul>';
  }
  public function delUser($idNav) {
      echo '<form action="'.encodeRoutage(22).'" method="post">
              <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Désinscription</button>
            </form>';
  }
  public function printRoles($valide) {
    $dataRoles = $this->getRoles($valide);
    $displayValide  = ['Non valide', 'Valide'];
       if($dataRoles != []) {
         ///$displayValide = 'Non valide';
         echo '<ul class="listClass">';
         echo '<li><h4>'.$displayValide[$valide].'</h4></li>';
         foreach ($dataRoles as $key => $value) {
           echo '<li>Type = '.$value['typeRole'].' Accréditation = '.$value['accreditation'].'</li>';
         }
         echo '</ul>';
       }
    }
}
