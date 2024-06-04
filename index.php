<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php include 'navbar.php'?>

<div class="top-container d-flex justify-content-center align-items-center flex-column">


</div>
<h1 class="text-center mt-5">Aktualni nabidka</h1>
<div class="mid-container d-flex justify-content-center align-items-center flex-row mt-5">
    <div class="container">
        <div class="row">
            <?php
            include './scripts/connection.php';

            $sql = "SELECT id, destination, description, length_days, price FROM Trip";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4 mb-3'>";
                    echo "<div class='card h-100'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row["destination"] . "</h5>";
                    echo "<p class='card-text'>" . $row["description"] . "</p>";
                    echo "<p class='card-text'>Délka: " . $row["length_days"] . " dnů</p>";
                    echo "<p class='card-text'>Cena: " . $row["price"] . " Kč</p>";
                    echo "<a href='trip.php?id=" . $row["id"] . "' class='btn btn-primary w-100'>Více</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Žádné nabídky nebyly nalezeny.";
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
