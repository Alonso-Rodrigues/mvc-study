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
            <div class="card bg-dark bg-gradient text-white rounded p-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-0">All articles written</h3>
                    <div class="float-right">
                        <a href="<?= url ?>/posts/register" class="btn btn-outline-light">To Write</a>
                    </div>
                </div>
                <div class="card-body bg-secondary bg-gradient rounded">
                    <?php foreach ($data['posts'] as $post) : ?>
                        <div class="card my-5 d-flex justify-content-between p-4">
                            <div class="card-header text-center">
                                <?= htmlspecialchars($post->title) ?>
                            </div>
                            <div class="card-body ">
                                <p class="card-text text-start mt-3">
                                    <?= htmlspecialchars($post->text) ?>
                                </p>
                                <a href="<?= url . '/posts/show/' . $post->postID ?>" class="btn btn-outline-primary" style="float: right;">
                                    Read More
                                </a>
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