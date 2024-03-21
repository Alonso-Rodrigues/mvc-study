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
                    <li class="breadcrumb-item active text-light" aria-current="page"><?= htmlspecialchars($data['post'][0]->title) ?></li>
                </ol>
            </nav>
            <div class="card text-center">
                <div class="card-header bg-secondary text-light">
                    <?= htmlspecialchars($data['post'][0]->title) ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars($data['post'][0]->text) ?></p>
                </div>
                <div class=" card-footer text-muted">
                    Written by: <?= htmlspecialchars($data['user'][0]->name) ?>
                    on date: <?= htmlspecialchars(Checker::correctDate($data['user'][0]->created_in)) ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>