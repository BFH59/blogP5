<?php $this->title = "Article"?>
    <h1>Mon Blog du projet 5</h1>
    <p>en construction</p>



        <div>
            <h2><?= htmlspecialchars($post->getTitle());?></h2>
            <h3><?= htmlspecialchars($post->getChapo());?></h3>
            <p><?= htmlspecialchars($post->getContent());?></p>
            <p><?= htmlspecialchars($post->getUsername());?></p>
            <p>Créé le : <?= htmlspecialchars($post->getPostdate());?></p>
        </div>

    <a href="../public/index.php">retourner à la liste des articles</a>
    <div id="comments" class="text-left" style="margin-left: 50px;">
        <h3>Commentaires de l'article</h3>
        <?php
        foreach($comments as $comment)
        {
            ?>
        <h4><?= htmlspecialchars($comment->getUsername());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le : <?= htmlspecialchars($comment->getCommentDate());?></p>
        <?php
        }
        ?>


    </div>
