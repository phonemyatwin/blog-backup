<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php include 'components/connection.php';
    $id = $_GET["id"];
    $data = "SELECT * FROM posts WHERE id=$id";
    $raw_data = $connection->query($data);
    $posts = $raw_data->fetch_assoc();

    $delete = $_POST["delete"];
    $cancel = $_POST["cancel"];
    if (isset($delete)) {
        unlink("media/" . $posts["image"]);
        $data = "DELETE FROM posts WHERE id=$id";
        $connection->query($data);
        header("location:list.php");
    }
    if (isset($cancel)) {
        header("location:list.php");
    }
    ?>
    <?php include 'components/header.php'; ?>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h3 class="card-title mb-0">Delete Post</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            Are you sure you want to delete this post? This action cannot be undone.
                        </div>
                        <dl class="row mb-0">
                            <dt class="col-sm-4">Title</dt>
                            <dd class="col-sm-8"><?= $posts["title"]; ?></dd>
                            <dt class="col-sm-4">Author</dt>
                            <dd class="col-sm-8"><?= $posts["author"]; ?></dd>
                            <dt class="col-sm-4">Created At</dt>
                            <dd class="col-sm-8 mb-0"><?= $posts["created_at"]; ?></dd>
                        </dl>
                    </div>
                    <div class="card-footer">
                        <form action="" method="post" class="d-flex gap-2">
                            <button type="submit" name="delete" class="btn btn-danger">Yes, Delete</button>
                            <a href="list.php" name="cancel" class="btn btn-outline-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'components/footer.php' ?>
    <script src="js/bootstrap.js"></script>
</body>

</html>