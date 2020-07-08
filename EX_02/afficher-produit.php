<?php
    function connect_to_database(){
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $databasename = "BaseTest01";

        try{
            $pdo=new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "<p>Vous êtes connecté</p>";
            return $pdo;
        }
        catch(PDOException $e) {
            echo "<p>Vous n'êtes pas connecté</p>".$e->getMessage();
        }
    }
    $pdo = connect_to_database();
    $produit = $pdo->query("SELECT * FROM produit")->fetchAll();


    foreach ($produit as $produit){
        echo "<ul><li>".$produit['nom']."</li></ul>";
    }
?>