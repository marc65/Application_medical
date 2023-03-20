<?php

//require('../Controller/rechercher_nom_patient_2bdd.php');
require('../Controller/Util.php');
session_start();
/*-- Verification si le formulaire d'authenfication a été bien saisie --*/
if ($_SESSION["acces"] != 'y') {
    /*-- Redirection vers la page d'authentification --*/
    header("location:index.php");
} else {
    $Util = new Util();
    $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
    $Medecin = new Secretaire();
    $Medecin = $Utilisateur->getMedecin();
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

        echo $Medecin->getNom_Medecin() . ' ' . $Medecin->getPrenom_Medecin();
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
        echo $Medecin->getNom_Medecin() . ' ' . $Medecin->getPrenom_Medecin();
        ?>
                                   </h4>
                              </center>
                         </div>
                         <div class="Left-body">
                              <div class="Left-body-head">
                                   Rechercher patient par nom
                              </div>
                              <div class="infos">

                              </div>
                              <div class="en_bref">
                                   <!--form action="../Controller/rechercher_nom_patient_2bdd.php" method="post"-->
                                   <form action="" method="post">

                                        <label for="nom">Rechercher par nom :</label>
                                        <input type="text" name="nom" id="nom">
                                        <input type="submit" name="submit" value="Rechercher">
                                   </form>
                              </div>

                              <div class="en_bref">
                                   <!--form action="../Controller/rechercher_nom_patient_2bdd.php" method="post"-->
                                        <table>
                                             <?php
                                             if (isset($_POST['submit'])) {

                                              $nom = $_POST['nom'];
                                              $nom = mysqli_real_escape_string($Util->mysqli, $nom);
                                              $sql = "SELECT * FROM patient WHERE Nom_Patient LIKE '%$nom%' ";
                                              $result = mysqli_query($Util->mysqli, $sql);
                                              
                                             if (mysqli_num_rows($result) > 0) {
                                                  // Affiche les résultats de la recherche
                                                  echo "<table>";
                                                  echo "<tr>";
                                                  echo "<th>ID</th>";
                                                  echo "<th>Nom</th>";
                                                  echo "<th>Prénom</th>";
                                                  echo "<th>Sexe</th>";
                                                  echo "</tr>";
                                                  while ($row = mysqli_fetch_assoc($result)) {
                                                       echo "<tr>";
                                                       echo "<td>" . $row['Id_Patient'] . "</td>";
                                                       echo "<td>" . $row['Nom_Patient'] . "</td>";
                                                       echo "<td>" . $row['Prenom_Patient'] . "</td>";
                                                       echo "<td>" . $row['Sexe_Patient'] . "</td>";
                                                       echo "</tr>";
                                                  }

                                                  echo "</table>";
                                             } 
                                        }?>
                                        </table>

                                   </form>

                              </div>

                         </div>


                         <div class="Right-body">
                              <div class="About-us">
                                   <div class="Social-NW-head">
                                   </div>
                                   <div class="Social-NW-body">

                                   <a href="#"><i class="icon-list"></i> Mes consultations</a>
                                <br />
                                <a href="consulter_patient_medecin.php"><i class="icon-user"></i> Liste des patients</a>
                                <br />
                                <a href="rechercher_nom_patient_medecin.php"><i class="icon-search"></i> Rechercher patient par nom</a>
                                <br />
                                <a href="consulter_consultation.php"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                <hr />
                                <a href="ajout_consultation.php"><i class="icon-plus-sign"></i> Ajouter consultation</a>
                                <br />
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