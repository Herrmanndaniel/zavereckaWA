<?php
session_start();
include './scripts/connection.php';

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $trip_id = intval($_GET['id']);
    // Fetch trip details from the database
    $sql = "SELECT destination, description, length_days, price FROM Trip WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $trip_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the trip exists
    if ($result->num_rows > 0) {
        $trip = $result->fetch_assoc();
    } else {
        echo "<script>alert('Trip not found'); window.location.href='index.php';</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href='index.php';</script>";
}

// Handle reservation
if (isset($_POST['reserve'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Insert the reservation into the database
        $sql = "INSERT INTO Reservation (user_id, trip_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $trip_id);

        if ($stmt->execute()) {
            echo "<script>alert('Reservation successful'); window.location.href='account.php';</script>";
        } else {
            echo "<script>alert('Reservation failed');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('You need to be logged in to make a reservation'); window.location.href='login.php';</script>";
    }
}

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
    <title>Trip Details</title>
</head>
<body>
<?php include 'navbar.php'?>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="container mt-5" >
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <h3 class="text-center mb-4" style="font-size: 70px"><?php echo htmlspecialchars($trip['destination']); ?></h3>
                <p class="text-center fs-1" style="font-weight: bold">Popis</p>
                <p style="font-size: 30px" class="text-center"><?php echo htmlspecialchars($trip['description']); ?></p>
                <p class="text-center fs-1" style="font-weight: bold">Délka</p>
                <p class="text-center" style="font-size: 30px"><?php echo htmlspecialchars($trip['length_days']); ?> dnů</p>
                <p class="text-center fs-1" style="font-weight: bold">Cena</p>
                <p class="text-center" style="font-size: 30px"><?php echo htmlspecialchars($trip['price']); ?> Kč</p>
                <form method="post">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="reserve">Rezervovat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
