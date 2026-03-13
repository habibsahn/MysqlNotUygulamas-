<?php

$connection = require_once 'Connection.php';

$notes = $connection->getNotes();

//echo "<pre>";
//var_dump($notes);
//echo "</pre>";

$currentNote = [
        'id' => '',
        'title' => '',
        'description' => ''
];

if (isset($_GET['id'])) {
    $currentNote = $connection->getNoteById($_GET['id']);
}

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
    <form class="new-note" action="save.php" method="post">
        <input type="hidden" value="<?php echo $currentNote['id'] ?>" name="id">
        <input type="text" name="title" placeholder="Not Başlığı" autocomplete="off" value="<?php echo $currentNote['title'] ?>">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Not Açıklama"><?php echo $currentNote['description']?></textarea>
        <button>
            <?php if ($currentNote['id']): ?>
            Notu Güncelle
            <?php else: ?>
            Not Ekle
            <?php endif; ?>
        </button>
    </form>
    <div class="notes">
        <?php foreach ($notes as $note): ?>
        <div class="note">
            <div class="title">
                <a href="?id=<?php echo $note['id']?>"><?php echo $note['title'] ?></a>
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
