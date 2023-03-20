<?php   
    require('../Controller/Util.php');
    
    $Util = new Util();
    
    if( isset($_POST["Date_Rendez_Vous"]) &&
        isset($_POST["Salle_Rendez_Vous"])&&
        isset($_POST["Id_Patient"])&&
        isset($_POST["Id_Medecin"])
        )
    {

        
        $Query = "INSERT INTO rendez_vous (Date_Rendez_Vous,Salle_Rendez_Vous, Id_Patient, Id_Medecin) VALUES"
                                   ."('".$_POST["Date_Rendez_Vous"]."',"
                                   ."'".$_POST["Salle_Rendez_Vous"]."',"
                                   ."'".$_POST["Id_Patient"]."',"
                                   ."'".$_POST["Id_Medecin"]."'"
                                   .")";
        
        $Util->dbConnection();
        
        if ($Util->mysqli->connect_error) {
            die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
        }
        
        else{
            if($Util->mysqli->query($Query) === TRUE) {
                header("location: ../Vue/secretaire_display.php");
            }
            else {
                echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
            }
        }
        if(empty($_POST["Date_Rendez_Vous"]) || empty($_POST["Salle_Rendez_Vous"]) || empty($_POST["Id_Patient"]) || empty($_POST["Id_Medecin"])) {
            die("Erreur : certaines données sont manquantes.");
        }
        
        if(!$result = $Util->mysqli->query($Query)) {
            die("Erreur de requête SQL : " . $Util->mysqli->error);
        }
             
    }
?>

