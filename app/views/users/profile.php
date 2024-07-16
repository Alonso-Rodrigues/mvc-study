<!-- No arquivo profile.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>
    <main class="d-flex justify-content-center">
        <div class="card-group bg-secondary bg-gradient d-flex flex-wrap justify-content-around py-5 w-75 rounded">
            <div class="card rounded p-3" style="max-width: 25em;">
                <div class="card-header bg-dark bg-gradient text-white text-center rounded">Nome do Bacana</div>
                <div class="card-body rounded">
                    <div class="card-body text-center">
                        <p class="card-text">Your Bio</p>
                    </div>
                </div>
            </div>
            <div class="card rounded p-3 row" style="max-width: 25em;">
                <div class="card-header bg-dark bg-gradient text-white text-center rounded">Your Information</div>
                <div class="card-body rounded">
                    <?= session::message('user') ?>
                    <form name="login" method="POST" action="<?= url ?>/users/profile">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:<sup class="text-danger">*</sup></label>
                            <input type="text" name="name" id="name" value="<?= htmlspecialchars(isset($data['user']->name) ? $data['user']->name : '') ?>" class=" form-control <?= isset($data['error_name']) && !empty($data['error_name']) ? 'is-invalid' : '' ?>">
                            <div class=" invalid-feedback">
                                <?= isset($data['error_name']) ? $data['error_name'] : '' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email: <sup class="text-danger">*</sup></label>
                            <input type="text" name="email" id="email" value="<?= htmlspecialchars(isset($data['email']) ? $data['email'] : '') ?>" class=" form-control <?= isset($data['error_email']) && !empty($data['error_email']) ? 'is-invalid' : '' ?>">
                            <div class=" invalid-feedback">
                                <?= isset($data['error_email']) ? $data['error_email'] : '' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password: <sup class="text-danger">*</sup></label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="form-label">Confirm the Password: <sup class="text-danger">*</sup></label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="biography" class="form-label">Biography: <sup class="text-danger">*</sup></label>
                            <textarea name="biography" id="biography" class="form-control"></textarea>
                        </div>
                        <hr>
                        <div class="row d-flex flex-wrap justify-content-sm-between">
                            <div class="col">
                                <input type="submit" value="Update" class="btn btn-success">
                            </div>
                            <div class="col">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
</body>


</html>