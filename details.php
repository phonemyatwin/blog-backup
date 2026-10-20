<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php include 'components/connection.php';
    $id = $_GET["id"];
    $data = "SELECT * FROM posts WHERE id=$id";
    $raw_data = $connection->query($data);
    $posts = $raw_data->fetch_assoc();
    ?>
    <?php include 'components/header.php' ?>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0"><?= $posts["title"]; ?></h3>
                            <a href="index.php" class="btn btn-outline-secondary btn-sm">Back</a>
                        </div>
                    </div>
                    <img src="media/<?= $posts["image"]; ?>" alt="Post image" class="card-img-top">
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-3 mb-3">
                            <p class="card-text mb-0">Author by <strong><?= $posts["author"]; ?></strong></p>
                            <p class="card-text mb-0">Viewer - <span class="badge bg-success"><?= $posts["viewer"]; ?></span></p>
                            <p class="card-text text-muted mb-0"><?= $posts["created_at"]; ?></p>
                        </div>
                        <hr>
                        <p class="card-text"><?= $posts["content"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'components/footer.php' ?>
    <script src="js/bootstrap.js"></script>
</body>

</html>