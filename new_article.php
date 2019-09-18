<!DOCTYPE html>
<html>
    <head lang="fr">
        <meta charset="utf-8">
        <title>Publier un article</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">

    
    </head>
    
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/progweb/blog/">Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor03">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/progweb/blog/">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/progweb/blog/new_article">Ajouter un article</a>
                        </li>
                        
                        
                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
        </nav>

<form action="" method="POST">
    <div id="formulaire">
        <h1>Publiez votre article</h1>
        <div class="form-group">
            <label for="title">Titre de votre article</label>
            <input class="form-control" type="text" id="title" name="title";>
        </div>
        <br>
        <label for="category">Catégorie de votre article</label>
        <textarea  class="form-control" id="category" name="category"></textarea>
        <br>
        <label for="content">Contenu de votre article</label>
        <textarea  class="form-control"id="content" name="content"rows="10"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" id="submit" name="submit">     
    </div>
</form>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', ''); // connexion à la BDD
$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_POST['title']) AND !empty($_POST['content']) and !empty($_POST['category'])){
    
    $title = htmlspecialchars($_POST['title']);
    $content = nl2br($_POST['content']);
    $category = htmlspecialchars($_POST['category']);
    
    $req = $bdd->prepare('INSERT INTO articles(title, content,created_at, category) VALUES(?,?,?,?)');
    if(!$req){
        echo "Prepare failed: (". $bdd->errno.") ".$bdd->error."<br>";
    }
    $test = $req->execute(array($title, $content, date('Y-m-d H:i:s'),$category));

    //var_dump($test);
    echo "L'article est publié !";
}
?>

<style>
body{
    text-align:center;
}

#formulaire{
    width:80%;
    margin-left:10%;
}
</style>

    </body>
</html>
