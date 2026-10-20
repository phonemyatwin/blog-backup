<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php include 'components/connection.php';
    $id = $_GET["id"];
    $data = "SELECT * FROM posts WHERE id='$id'";
    $raw_data = $connection->query($data);
    $posts = $raw_data->fetch_assoc();

    $title = $_POST["title"];
    $author = $_POST["author"];
    $viewer = $_POST["viewer"];
    $content = $_POST["content"];
    $update = $_POST["update"];
    $cancel = $_POST["cancel"];
    $old_image = $posts["image"];
    $new_image = time() . "_" . $_FILES["image"]["name"];

    if (isset($update)) {
        if ($new_image) {
            $image = $new_image;
            if (file_exists("media/" . $old_image)) {
                unlink("media/" . $old_image);
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], "media/" . $image);
        } else {
            $image = $old_image;
        }
        $data = "UPDATE posts SET title='$title', author='$author', viewer='$viewer', image='$image', content='$content' WHERE id ='$id'";
        $connection->query($data);
        header("location: list.php");
    }
    if (isset($cancel)) {
        header("location:list.php");
    }
    ?>
    <?php include 'components/header.php' ?>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Update Post</h3>
                            <a href="list.php" class="btn btn-outline-secondary btn-sm">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?= $posts['title']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" name="author" id="author" value="<?= $posts['author']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="viewer" class="form-label">Viewer</label>
                                <input type="number" class="form-control" name="viewer" id="viewer" min="0" value="<?= $posts['viewer']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                <div class="form-text">Leave empty to keep the current image.</div>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" name="content" id="content" rows="6" required><?= $posts['content']; ?></textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" name="update" class="btn btn-dark">Update Post</button>
                                <a href="list.php" name="cancel" class="btn btn-outline-secondary">Cancel</a>
                            </div>
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