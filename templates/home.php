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
        foreach ($posts as $post)
        {
         ?>
            <div>
                <h2><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId());?>"><?= htmlspecialchars($post->getTitle());?></a></h2>
            <h3><?= htmlspecialchars($post->getChapo());?></h3>
            <p><?= htmlspecialchars($post->getContent());?></p>
            <p><?= htmlspecialchars($post->getUsername());?></p>
            <p>Créé le : <?= htmlspecialchars($post->getPostDate());?></p>
            </div>
        <br>
        <?php
        }

        ?>
    </div>
</body>
</html>