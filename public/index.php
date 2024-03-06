<?php
include '../app/config.php';
include '../app/library/Route.php';
include '../app/library/Controller.php';
include '../app/library/connect.php';
$db = new DataBase;

$user_id = 10;
$title = 'title post';
$text = 'text post';
$db->query("INSERT INTO posts(user_id, title, text) VALUES(:user_id, :title, :text)");
$db->bind(':user_id', $user_id);
$db->bind(':title', $title);
$db->bind(':text', $text);
$db->execute();
echo "<hr>Total Results: " . $db->totalResults();
echo "<hr>Last Id: " . $db->lastId();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= app_name ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= url ?>/public/css/style.css">
</head>

<body>
    <?php
    include '../app/views/top.php';
    $routes = new Route();
    include '../app/views/footer.php';
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src=" <?= url ?>/public/js/script.js"></script>

</html>