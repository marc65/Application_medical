<?php

require('../Controller/consulter_medecin_2bdd.php');

session_start();

/*-- Verification si le formulaire d'authenfication a été bien saisie --*/
if ($_SESSION["acces"] != 'y') {
     /*-- Redirection vers la page d'authentification --*/
     header("location:index.php");
} else {
     $Util = new Util();
     $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
     $Secretaire = new Secretaire();
     $Secretaire = $Utilisateur->getSecretaire();
}
?>
<html>

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>
          <?php

          echo $Secretaire->getNom_Secretaire() . ' ' . $Secretaire->getPrenom_Secretaire();
          ?>
     </title>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
     <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
     <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico" />
</head>

<body>
     <div class="container">
          <div class="row">
               <div id="content" class="span9">
                    <div class="main_body">

                         <div class="Home-Header">
                              <div class="Slogan">

                              </div>
                              <div class="Contact-Research">

                              </div>
                              <div class="Logo">

                              </div>
                         </div>
                         <div class="Horizontal-menu">
                              <center>
                                   <h4>
                                        <?php
                                        echo $Secretaire->getNom_Secretaire() . ' ' . $Secretaire->getPrenom_Secretaire();
                                        ?>
                                   </h4>
                              </center>
                         </div>
                         <div class="Left-body">
                              <div class="Left-body-head">
                                   Consulter medecins
                              </div>
                              <div class="infos">

                              </div>
                              <div class="en_bref">
                                   <form action="../Controller/consulter_patient_2bdd.php" method="get">
                                        <table>
                                             <thead>
                                                  <tr>
                                                       <th>Id_Medecin</th>
                                                       <th>Nom Medecin</th>
                                                       <th>Prénom Medecin</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                       <tr>
                                                            <td><?php echo $row['Id_Medecin']; ?></td>
                                                            <td><?php echo $row['Nom_Medecin']; ?></td>
                                                            <td><?php echo $row['Prenom_Medecin']; ?></td>
                                                       </tr>
                                                  <?php } ?>
                                             </tbody>
                                        </table>

                              </div>

                         </div>
                         <div class="Right-body">
                              <div class="About-us">
                                   <div class="Social-NW-head">

                                   </div>
                                   <div class="Social-NW-body">

                                        <a href="consulter_patient.php"><i class="icon-user"></i> Liste des patients</a>
                                        <br />
                                        <a href="consulter_medecin.php"><i class="icon-glass"></i> Liste Medecin</a>
                                        <br />
                                        <a href="rechercher_nom_patient.php"><i class="icon-search"></i> Rechercher patient par nom</a>
                                        <br />
                                        <a href="consulter_rdv.php"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                        <hr />
                                        <a href="ajout_rdv.php"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                        <br />
                                        <a href="ajout_patient.php"><i class="icon-plus"></i> Nouvelle fiche patient</a>
                                        <hr />
                                        <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se d&eacute;connecter</a>

                                   </div>
                              </div>


                         </div>
                    </div>
                    <div class="footer">
                         &COPY; Cabinet Médical 2021
                    </div>
               </div>
          </div>
     </div>
     <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
     <script type="text/javascript" src="js/bootstrap.js"></script>
</body>



</html>