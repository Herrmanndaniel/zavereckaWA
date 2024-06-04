<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            header("Location: ../account.php");
            exit();
        } else {
            echo "Incorrect password.<br>";
            echo "Entered Password: " . $password . "<br>";
            echo "Stored Password: " . $user['password'] . "<br>";
        }
    } else {
        echo "No user found with that email.<br>";
        echo "Entered Email: " . $email . "<br>";
    }

    $stmt->close();
}

$conn->close();
?>
