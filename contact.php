<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Ungueltige E-Mail-Adresse"]);
        exit;
    }

    $data = "Name: $name\nEmail: $email\nMessage: $message\n------------------------\n";

    mail("dominik.aspeck@aspeck.net", "KontaktFormular (bulme.cpc.co.at)", $data);
    mail("sg@bulme.at", "KontaktFormular (bulme.cpc.co.at)", $data);

    echo json_encode(["status" => "success", "message" => "Danke fuer deine Nachricht, $name!"]);
    
} else {
    echo json_encode(["status" => "error", "message" => "Nicht moeglich"]);
}

?>
