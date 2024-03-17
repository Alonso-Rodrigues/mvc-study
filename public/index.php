<?php
session_start();
include '../app/config.php';
include '../app/autoload.php';

// $db = new DataBase;
// $id = 8;
// $user_id = 2;
// $title = 'title post edit';
// $text = 'text post edit';
// date_default_timezone_set('Europe/Paris');
// $created_in = date('Y-m-d H:i:s');
//---------------------------------------|Insert|-----------------------------------------
// $db->query("INSERT INTO posts(user_id, title, text) VALUES(:user_id, :title, :text)");
// $db->bind(':user_id', $user_id);
// $db->bind(':title', $title);
// $db->bind(':text', $text);
// $db->execute();
// echo "<hr>Total Results: " . $db->totalResults();
// echo "<hr>Last Id: " . $db->lastId();
//---------------------------------------|UpDate|-----------------------------------------
// $db->query("UPDATE posts SET user_id = :user_id, title = :title, text = :text, created_in = :created_in WHERE id = :id");
// $db->bind(':id', $id);
// $db->bind(':user_id', $user_id);
// $db->bind(':title', $title);
// $db->bind(':text', $text);
// $db->bind(':created_in', $created_in);
// $db->execute();
// echo "<hr>Total Results: " . $db->totalResults();
//---------------------------------------|Delete|-----------------------------------------
// $db->query("DELETE FROM posts WHERE id = :id");
// $db->bind(':id', $id);
// $db->execute();
// echo "<hr>Total Results: " . $db->totalResults();
//---------------------------------------|Select|-----------------------------------------
// $db->query("SELECT * FROM posts WHERE id = {$id} ORDER BY id ASC");
// // $db->result();
// // $db->execute();
// // echo $db->result()->title;
// foreach ($db->results() as $post) {
//     echo htmlspecialchars($post->id) . ' - ' . htmlspecialchars($post->title) . '<br>';
// }
// echo "<hr>Total Results: " . htmlspecialchars($db->totalResults());
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

<!-- parei aula 26 -->