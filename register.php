<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php include 'components/connection.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $register = $_POST["register"];
    $not_match = "";

    if (isset($register)) {
        if ($password == $cpassword) {
            $data = "INSERT INTO users(name, email, password) VALUE('$name', '$email', '$password')";
            $connection->query($data);
            header("location:login.php");
        } else {
            $not_match = "Passwords do not match. Please try again.";
        }
    }
    ?>
    <?php include 'components/header.php'; ?>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="cpassword" placeholder="Confirm your password" required>
                                <p class="text-danger pt-2"><?= $not_match; ?></p>
                            </div>
                            <button type="submit" class="btn btn-dark w-100" name="register">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'components/footer.php' ?>
    <script src="js/bootstrap.js"></script>
</body>

</html>