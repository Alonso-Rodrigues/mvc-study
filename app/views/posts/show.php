<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
    <main>
        <div class="container my-5 rounded bg-dark bg-gradient p-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url ?>/posts">Posts</a></li>
                    <li class="breadcrumb-item active text-light" aria-current="page"><?= htmlspecialchars($data['post']->title) ?></li>
                </ol>
            </nav>
            <div class="card text-center p-3">
                <div class="card-header">
                    <?= htmlspecialchars($data['post']->title) ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars($data['post']->text) ?></p>
                </div>
                <div class=" card-footer text-muted">
                    Written by: <?= htmlspecialchars($data['user']->name) ?>
                    on date: <?= htmlspecialchars(Checker::correctDate($data['user']->created_in)) ?>
                </div>
                <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
                    <hr>
                    <div>
                        <ul class="list-inline d-flex justify-content-between">
                            <li class="list-inline-item">
                                <a href="<?= url . '/posts/edit/' . $data['post']->id ?>" class="btn btn-warning">Edit</a>
                            </li>
                            <li>
                                <form action="<?= url . '/posts/delete/' . $data['post']->id ?>" method="POST">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </main>
</body>

</html>