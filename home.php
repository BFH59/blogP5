<?php
require 'Database.php';
require 'Post.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Blog Projet 5</title>
</head>

<body>
    <div>
        <h1>Mon Blog du projet 5</h1>
        <p>en construction</p>

        <?php
        $post = new Post();
        $posts = $post->getPosts();
        while($data = $posts->fetch())
        {
         ?>
            <div>
                <h2><a href="single.php?postId=<?= htmlspecialchars($data['id']);?>"><?= htmlspecialchars($data['title']);?></a></h2>
            <h3><?= htmlspecialchars($data['chapo']);?></h3>
            <p><?= htmlspecialchars($data['content']);?></p>
            <p><?= htmlspecialchars($data['user_id']);?></p>
            <p>Créé le : <?= htmlspecialchars($data['post_date']);?></p>
            </div>
        <br>
        <?php
        }
        $posts->closeCursor();
        ?>
    </div>
</body>
</html>