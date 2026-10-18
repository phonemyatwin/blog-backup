<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php include "components/connection.php";
    $title = $_POST["title"];
    $author = $_POST["author"];
    $viewer = $_POST["viewer"];
    $image = $_POST["image"];
    $content = $_POST["content"];
    $create = $_POST["create"];

    if (isset($create)) {
        $data = "INSERT INTO posts(title, author, viewer, image, content) VALUE('$title', '$author', '$viewer', '$image', '$content')";
        $connection->query($data);
        header("location: list.php");
    }
    ?>
    <?php include 'components/header.php'; ?>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Add New Post</h3>
                            <a href="list.php" class="btn btn-outline-secondary btn-sm">Back to List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter post title" required>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" name="author" id="author" placeholder="Enter author name" required>
                            </div>
                            <div class="mb-3">
                                <label for="viewer" class="form-label">Viewer</label>
                                <input type="number" class="form-control" name="viewer" id="viewer" placeholder="Enter viewer count" min="0" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="6" placeholder="Write your post content..." required></textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" name="create" class="btn btn-dark">Create Post</button>
                                <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
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