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
                <div class="card-body text-center bg-secondary">
                    <p class="m-0">List of Posts Here</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>