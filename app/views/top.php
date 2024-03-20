<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>

<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="<?= url ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"></svg>
            <span class="fs-4">MVC</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item" style="margin-right: 50px;">
                <a href="<?= url ?>" class="nav-link active" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a href="<?= url ?>/pages/about" class="nav-link" style="margin-right: 25px;">About me</a>
            </li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <p class="nav-link" style="margin-right: 25px;">
                    Welcome, <?= $_SESSION['user_name']; ?>
                    <a class="btn btn-sm btn-danger" style="margin-left: 50px" href="<?= url ?>/users/logOut">Log Out</a>
                </p>
            <?php } else { ?>
                <li class="nav-item"><a href="<?= url ?>/users/register" class="nav-link" style="margin-right: 50px;">Register</a></li>
                <li class="nav-item"><a href="<?= url ?>/users/login" class="nav-link" style="margin-right: 50px;">Login</a></li>
            <?php } ?>
        </ul>

    </header>
</body>

</html>