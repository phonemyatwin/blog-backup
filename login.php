<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php include 'components/connection.php';
    $data = "SELECT * FROM users";
    $raw_data = $connection->query($data);
    while ($users = $raw_data->fetch_assoc()):

        $email = $_POST["email"];
        $password = $_POST["password"];
        $remember = $_POST["remember"];
        $login = $_POST["login"];
        $not_match = "";

        if (isset($login)) {
            if ($email == $users["email"] && $password == $users["password"]) {
                if (isset($remember)) {
                    setcookie("c_email", $email, time() + 60 * 999999999);
                    setcookie("c_password", $password, time() + 60 * 999999999);
                }
                header("location:index.php");
            } else {
                $not_match = "Your email and password do not match. Please try again.";
            }
        }
    endwhile;
    ?>
    <?php include 'components/header.php' ?>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required value="<?= $_COOKIE['c_email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required value="<?= $_COOKIE['c_password']; ?>">
                                <p class="text-danger pt-2"><?= $not_match ?></p>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-dark w-100" name="login">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Don't have an account? <a href="register.php">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'components/footer.php' ?>
    <script src="js/bootstrap.js"></script>
</body>

</html>