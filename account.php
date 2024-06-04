<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

include './scripts/connection.php';

// Fetch user's reservations
$user_id = $_SESSION['user_id'];
$sql = "SELECT Trip.destination, Trip.description, Trip.length_days, Trip.price 
        FROM Reservation 
        JOIN Trip ON Reservation.trip_id = Trip.id 
        WHERE Reservation.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$reservations = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Účet</title>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container d-flex justify-content-center flex-column" style="height: 100vh">
    <div class="container d-flex justify-content-center flex-column profile-details-container">
        <h1 style="font-size: 70px" class="text-center">Ahoj! <?php echo htmlspecialchars($_SESSION['name']); ?></h1>
        <div class="detail-container flex-row container d-flex">
            <h3>Jméno:</h3>
            <h3 class="detail"><?php echo htmlspecialchars($_SESSION['name']); ?></h3>
        </div>
        <div class="detail-container flex-row container d-flex">
            <h3>Příjmení:</h3>
            <h3 class="detail"><?php echo htmlspecialchars($_SESSION['surname']); ?></h3>
        </div>
        <div class="detail-container flex-row container d-flex">
            <h3>Email:</h3>
            <h3 class="detail"><?php echo htmlspecialchars($_SESSION['email']); ?></h3>
        </div>
        <div class="detail-container flex-row container d-flex align-content-center">
            <h3>Heslo:</h3>
            <h3 class="detail-password"><?php echo htmlspecialchars($_SESSION['password']); ?></h3>
        </div>
    </div>

    <!-- Display user's reservations -->
    <div class="container d-flex justify-content-center align-items-center">
        <h1 class="text-center">Tvoje rezervace</h1>
    </div>
    <div class="container">
        <?php if (count($reservations) > 0): ?>
            <div class="row">
                <?php foreach ($reservations as $reservation): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($reservation['destination']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($reservation['description']); ?></p>
                                <p class="card-text"><strong>Délka:</strong> <?php echo htmlspecialchars($reservation['length_days']); ?> dnů</p>
                                <p class="card-text"><strong>Cena:</strong> <?php echo htmlspecialchars($reservation['price']); ?> Kč</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Nemáte žádné rezervace.</p>
        <?php endif; ?>
    </div>
</div>
<?php include 'footer.php'?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
