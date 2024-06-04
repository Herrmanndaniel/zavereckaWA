<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['inputName'];
    $surname = $_POST['inputSurname'];
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $sql = "INSERT INTO Users (name, surname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $surname, $email, $password);

    if ($stmt->execute()) {
        // Store user data in session variables
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['email'] = $email;
        header("Location: account.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
