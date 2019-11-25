<?php
$this->title = "ajouter un artile";
?>

<h1>Mon blog</h1>
<p>En construction</p>

<div>
    <form method="post" action="../public/index.php?route=addPost">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?php
            if(isset($post['title'])){
                echo $post['title'];}?>"><br>
        <label for="chapo">Chapo</label><br>
        <input type="text" id="chapo" name="chapo" value="<?php
        if(isset($post['chapo'])){
            echo $post['chapo'];}?>"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?php
        if(isset($post['content'])){
            echo $post['content'];}?></textarea><br>
        <!--  Ajout de l id utilisateur manuellement pr le moment-->
        <label for="user_id">Auteur</label><br>
        <input type="hidden" id="user_id" name="user_id" value="1">
        <br>
        <input type="submit" value="envoyer" id="submit" name="submit">

    </form>

    <a href="../public/index.php">Retour à l'accueil</a>
</div>

