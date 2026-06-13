<?php
// Connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bcao_database";

$conn = new mysqli($host, $user, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Vérifier l’envoi du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $sql = "INSERT INTO contacts (nom, email, message) 
            VALUES ('$nom', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message envoyé avec succès ✅";
    } else {
        echo "Erreur : " . $conn->error;
    }
}

$conn->close();
?>
