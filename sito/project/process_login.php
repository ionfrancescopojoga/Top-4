<?php
// Verifica se sono stati inviati dati dal modulo di login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i valori inviati dal modulo di login
    $id_student = $_POST["id_student"];
    $email = $_POST["email"];

    // Connessione al database
    $servername = "127.0.0.1";
    $username = "root"; // Modifica con il tuo username
    $password = "Vmware1!"; // Modifica con la tua password
    $dbname = "sito"; // Modifica con il nome del tuo database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la connessione al database
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Query per inserire i dati dello studente nella tabella students
    $sql = "INSERT INTO students (id_student, email) VALUES ('$id_student', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Login avvenuto con successo e informazioni dello studente salvate!";
    } else {
        echo "Errore durante il login: " . $sql . "<br>" . $conn->error;
    }

    // Chiudi la connessione al database
    $conn->close();
}
?>
