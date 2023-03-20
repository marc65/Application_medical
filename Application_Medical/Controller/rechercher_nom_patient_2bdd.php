<?php
    require('../Controller/Util.php');
    
    $Util = new Util();
    $Util->dbConnection();
    
    $nom = $_POST['nom'];
    $nom = mysqli_real_escape_string($Util->mysqli, $nom);
    $sql = "SELECT * FROM patient WHERE Nom_Patient LIKE '%$nom%' ";
    $result = mysqli_query($Util->mysqli, $sql);

if ($Util->mysqli->connect_error) {
    die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
}
