<?php

require_once 'Connection.php';
$connection = new Connection();

$notes = $connection->getNotes();

//echo "<pre>";
//var_dump($notes);
//echo "</pre>";

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
<div>
    <form class="new-note" action="create.php" method="post">
        <input type="text" name="title" placeholder="Not Başlığı" autocomplete="off">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Not Açıklama"></textarea>
        <button>New note</button>
    </form>
    <div class="notes">
        <?php foreach ($notes as $note): ?>
        <div class="note">
            <div class="title">
                <a href=""><?php echo $note['title'] ?></a>
            </div>
            <div class="description">
                <?php echo $note['description'] ?>
            </div>
            <small><?php echo $note['create_date'] ?></small>
            <button class="close">X</button>
        </div>
        <?php endforeach; ?>
    </div>

</div>
</body>
</html>
