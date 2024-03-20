<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Posts</title>
</head>

<body>
    <main>
        <div class="col-md-8 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url ?>/posts">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body bg-secondary text-white rounded">
                    <h2 class="text-center p-3">Register Posts</h2>
                    <hr>
                    <form name="login" method="POST" action="<?= url ?>/posts/register">
                        <div class="form-group">
                            <label for="title" class="form-label">Title: <sup class="text-danger">*</sup></label>
                            <input type="text" name="title" id="title" value="<?= $data['title'] ?>" class="form-control <?= isset($data['error_title']) && !empty($data['error_title']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($data['error_title']) ? $data['error_title'] : '' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Text: <sup class="text-danger">*</sup></label>
                            <textarea name="text" id="text" class="form-control <?= isset($data['error_text']) && !empty($data['error_text']) ? 'is-invalid' : '' ?>" rows="5"><?= $data['text'] ?></textarea>
                            <div class="invalid-feedback">
                                <?= $data['error_text'] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <input type="submit" value="Register" class="btn btn-primary w-100 p-3 text-light">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>