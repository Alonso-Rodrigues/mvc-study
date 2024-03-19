<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="col-xl-4 col-md-6 mx-auto p-5">
            <div class="card">
                <div class="card-body bg-secondary text-white rounded">
                    <h2 class="text-center">Login</h2>
                    <p class="card-text"><small class="text-muted">Fill in your details to log in</small></p>
                    <?= session::message('user') ?>
                    <form name="login" method="POST" action="<?= url ?>/users/login">
                        <div class="form-group">
                            <label for="email" class="form-label">Email: <sup class="text-danger">*</sup></label>
                            <input type="text" name="email" id="email" value="<?= $data['email'] ?>" class="form-control <?= isset($data['error_email']) && !empty($data['error_email']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($data['error_email']) ? $data['error_email'] : '' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password: <sup class="text-danger">*</sup></label>
                            <input type="password" name="password" id="password" value="<?= $data['password'] ?>" class="form-control <?= isset($data['error_password']) && !empty($data['error_password']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($data['error_password']) ? $data['error_password'] : '' ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="login" class="btn btn-info btn-block">
                            </div>
                            <div class="col">
                                <a href="<?= url ?>/users/register">Don't have an account? Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>