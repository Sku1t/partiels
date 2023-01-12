<?php
  // Vérifie qu'il provient d'un formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //identifiants mysql
      $host = "localhost";
      $username = "root";
      $password = "root";
      $database = "ricopartiel";

    $nom = $_POST["nom"]; 
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    
    if (!isset($nom)){
      die("S'il vous plaît entrez votre nom");
    }
    if (!isset($prenom)){
      die("S'il vous plaît entrez votre adresse e-mail");
    }
    if (!isset($age)){
        die("S'il vous plaît entrez votre adresse e-mail");
      }

      //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($host, $username, $password, $database);

    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
      }  

        //préparer la requête d'insertion SQL
    $statement = $mysqli->prepare("INSERT INTO morganpartiel (nom, prenom, age) VALUES(?, ?, ?)"); 
    //Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param($nom, $prenom);
    
    if($statement->execute()){
        print "Salut " . $nom . "!, votre adresse e-mail est ". $prenom;
      }else{
        print $mysqli->error; 
      }
  }
?>