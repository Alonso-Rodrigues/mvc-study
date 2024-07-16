<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>

<body>
    <header class="d-flex flex-wrap justify-content-around py-4 mb-4 border-bottom">
        <a href="<?= url ?>">
            <img class="rounded-circle" src="<?= url ?>/public/img/logo.jpg" alt="logo" style="width: 150px; height: 90px;">
        </a>

        <ul class="nav nav-pills d-flex align-items-center">
            <li class="nav-item">
                <a href="<?= url ?>" class="nav-link active" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a href="<?= url ?>/pages/about" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
                <a href="<?= url ?>/users/profile" class="nav-link">Profile</a>
            </li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li class="nav-link">
                    Welcome, <?= $_SESSION['user_name']; ?>
                </li>
                <a class="btn btn-sm btn-danger" href="<?= url ?>/users/logOut">Log Out</a>
            <?php } else { ?>
                <li class="nav-item"><a href="<?= url ?>/users/register" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="<?= url ?>/users/login" class="nav-link">Login</a></li>
            <?php } ?>
        </ul>
        
    </header>
</body>

</html>