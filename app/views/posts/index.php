<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>

<body>
    <main>
        <div class="container py-5">
            <?= session::message('post') ?>
            <div class="card bg-dark text-white rounded">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-0">Posts</h3>
                    <div class="float-right">
                        <a href="<?= url ?>/posts/register" class="btn btn-light">To Write</a>
                    </div>
                </div>
                <div class="card-body bg-secondary ">
                    <?php foreach ($data['posts'] as $post) : ?>
                        <div class="card my-5 d-flex justify-content-between">
                            <div class="card-header">
                                <?= htmlspecialchars($post->title) ?>
                            </div>
                            <div class="card-body ">
                                <p class="card-text">
                                    <?= htmlspecialchars($post->text) ?>
                                </p>
                                <a href="#" class="btn btn-primary" style="float: right;">Read More</a>
                            </div>
                            <div class=" card-footer text-muted">
                                Written by: <?= htmlspecialchars($post->name) ?> 
                                on date: <?= htmlspecialchars(Checker::correctDate($post->postsDateRegister)) ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>