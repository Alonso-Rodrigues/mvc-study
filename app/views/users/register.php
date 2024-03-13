<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <main>
        <div class="col-xl-4 col-md-6 mx-auto p-5">
            <div class="card">
                <div class="card-body">
                    <h2>Register</h2>
                    <p class="card-text"><small class="text-muted">Fill the form</small></p>
                    <form action="register" method="POST" action="<?= url ?>/user/register">
                        <div class="form-group">
                            <label for="name" class="form-label">Name: <sup class="text-danger">*</sup></label>
                            <input type="text" name="name" id="name" value="<?= $data['name'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email: <sup class="text-danger">*</sup></label>
                            <input type="email" name="email" id="email" value="<?= $data['email'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password: <sup class="text-danger">*</sup></label>
                            <input type="password" name="password" id="password" value="<?= $data['password'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="form-label">Confirm the Password: <sup class="text-danger">*</sup></label>
                            <input type="password" name="confirm_password" id="confirm_password" value="<?= $data['confirm_password'] ?>" class="form-control" required>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Register" class="btn btn-info btn-block">
                            </div>
                            <div class="col">
                                <a href="#">Do you have an account? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>