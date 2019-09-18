<!DOCTYPE html>
<html>

<head lang="fr">
    <meta charset="utf-8">
    <title>Home</title>
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
                    <a class="nav-link" href="new_article">Ajouter un article</a>
                </li>


            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php $bdd=new PDO( 'mysql:host=localhost;dbname=blog2;charset=utf8', 'root', ''); // connexion à la BDD 
    
    if (isset($_GET['id'])) { 
        $getid=intval($_GET['id']); 
    } else { 
        header( 'location:index.php'); 
    } 
    $req=$bdd->prepare('SELECT * FROM articles WHERE id = ?'); 
    $req->execute(array($getid)); 
    $data = $req->fetch(); ?>


    <h3>
      <a><?php echo htmlspecialchars($data['title']); ?></a>
      <em>publié le <?php echo $data['created_at']; ?></em>
      dans la catégorie <?php echo $data['category']; ?>
	</h3>

    <p>
        <?php echo nl2br(htmlspecialchars($data[ 'content'])); ?>
    </p>


</body>
</html>