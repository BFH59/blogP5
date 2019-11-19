<?php
session_start();
?>
<?php
$this->title = 'Accueil';
?>

<h1>Mon Blog du projet 5</h1>
<p>en construction</p>

<?php
if(isset($_SESSION['addPost'])){
    echo '<p>'.$_SESSION['addPost'].'<p>';
    unset($_SESSION['addPost']);
}

?>
<a href="../public/index.php?route=addPost">Ajouter un article (test avant partie admin)</a>
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
