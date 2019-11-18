<?php
require 'Database.php';
require 'Post.php';
require 'comment.php';

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
    $post = $post->getPost($_GET['postId']);
    $data = $post->fetch();
    ?>

        <div>
            <h2><?= htmlspecialchars($data['title']);?></h2>
            <h3><?= htmlspecialchars($data['chapo']);?></h3>
            <p><?= htmlspecialchars($data['content']);?></p>
            <p><?= htmlspecialchars($data['user_id']);?></p>
            <p>Créé le : <?= htmlspecialchars($data['post_date']);?></p>
        </div>
    <?php
    $post->closeCursor();
    ?>
    <a href="home.php">retourner à la liste des articles</a>
    <div id="comments" class="text-left" style="margin-left: 50px;">
        <h3>Commentaires de l'article</h3>
        <?php
        $comment = new Comment();
        $comments = $comment->getCommentsFromPost($_GET['postId']);
        while ($datas = $comments->fetch())
        {
            ?>
        <h4><?= htmlspecialchars($datas['user_id']);?></h4>
        <p><?= htmlspecialchars($datas['content']);?></p>
        <p>Posté le : <?= htmlspecialchars($datas['comment_date']);?></p>
        <?php
        }
        $comments->closeCursor();
        ?>


    </div>
</div>
</body>
</html>