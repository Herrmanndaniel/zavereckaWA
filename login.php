<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Přihlášení-Registrace</title>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="card mb-3" id="login-form">
                <div class="card-header" id="login-header">
                    <h3 class="text-center">Přihlášení</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="./scripts/loginScript.php">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Heslo</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="login">Přihlásit</button>
                            <button type="button" class="btn btn-secondary" onclick="switchForm()">Registrace</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card" id="register-form" style="display: none;">
                <div class="card-header" id="register-header">
                    <h3 class="text-center">Registrace</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="./scripts/registerScript.php">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Jméno</label>
                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label">Příjmení</label>
                            <input type="text" class="form-control" id="inputSurname" name="inputSurname" placeholder="Your Surname" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmailReg" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordReg" class="form-label">Heslo</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="register">Registrovat</button>
                            <button type="button" class="btn btn-secondary" onclick="switchForm()">Přihlášení</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function switchForm() {
        var loginForm = document.getElementById("login-form");
        var registerForm = document.getElementById("register-form");

        if (loginForm.style.display === "none") {
            loginForm.style.display = "block";
            registerForm.style.display = "none";
        } else {
            loginForm.style.display = "none";
            registerForm.style.display = "block";
        }
    }
</script>
</body>
</html>


