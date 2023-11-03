# GrainePublic
Graine Public est une base de site web avec :
  - Possiblité de créer un utilisateur
  - Administration des utilisateur
  - Création d'autre module avec notamment un système de création de menus  déroulant
  - Gestion des menus /sécurité des zones en fonction des droits lier automatisé.

##Le projet propose
  - Une architecture MVS
  - Une approche modulaires
  - Un affichage via la seule page d'index
  - Une randomisation des clés de navigations
  - Une randomisation des clés pour accédé au traitement des formulaires
  - Un automatisation des contrôles de sécurité (identité, validité de la session) automatisé lors de l'accession au traitement des formulaires

## 2 ou plusieurs base de données
  - Vous pouvez créer une ou plusieur base de données métier, qui ne seront pas intriqué dans la base de donnée system
  - pour ce faire, il faut aller dans "objets/RCUD.php" et déclarer le nom de votre base de données dans le paramètre dbName, puis indiqué lorsque vous faite des accées à votre base de données, quelle base de données est impliqué dans votre code via son index.
  - exemple : ActionDB::select($sql, $param, 0) => base de donnée system // ActionDB::select($sql, $param, 1) => base de donnée métier.

## Modules et administration
  - Quand vous créez un module, vous pouvez maintenant le faire sur l'administration et l'administrer totalement (valide il est disponible, invalide, il disparait du site)  

## V2 - Textearea

  - La V2 va proposer divers outils pour rendre la saisie de texte plus confortable.


  # GrainePublic // English
  Graine Public is a web-based platform featuring the following functionalities:
  - User registration capability
  - User administration
  - Creation of other modules, including a dropdown menu creation system
  - Menu management / security of areas based on automated linked rights.

  ## The project offers
  - An MVC architecture
  - A modular approach
  - Display through a single index page
  - Randomization of navigation keys
  - Randomization of keys to access form processing
  - Automation of security checks (identity, session validity) when accessing form processing.

  ## 2 or more databases
  - You can create one or several business databases that will not be integrated into the system database.
  - To do this, go to "objects/RCUD.php" and declare the name of your database in the dbName parameter, then indicate which database is involved in your code via its index when accessing your database.
  - Example: ActionDB::select($sql, $param, 0) => system database // ActionDB::select($sql, $param, 1) => business database.

  ## Modules and administration
  - When you create a module, you can now do it in the administration section and fully manage it (validate it for availability, invalidate it to remove it from the site).

  ## V2 - Textarea
  - Version 2 (V2) will offer various tools to make text input more comfortable.
