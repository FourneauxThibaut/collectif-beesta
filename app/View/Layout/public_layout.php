<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO / Google -->
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="./assets/images/beesta-icon.svg" type="image/x-icon">
    <meta name="author" content="Fourneaux Thibaut">
    <meta 
        name="description" 
        content="Description text here....."
    >
    <link rel="canonical" href="URL here..."> 

    <!-- Social: Twitter -->
    <!-- After inserting META need to validate at https://dev.twitter.com/docs/cards/validation/validator -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@8bit_code">
    <meta name="twitter:creator" content="8bit_code">
    <meta name="twitter:title" content="Title here...">
    <meta name="twitter:description" content="Description here....">
    <meta name="twitter:image:src" content="path/to/img">

    <!-- Social: Facebook / Open Graph -->
    <meta property="fb:admins" content="ID here...">
    <meta property="fb:app_id" content="ID here...">
    <meta property="og:url" content="URL here...">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Title here...">
    <meta property="og:image" content="path/to/img"/>
    <meta property="og:description" content="Description here...">
    <meta property="og:site_name" content="8Bit Code">
    <meta property="article:author" content="https://www.facebook.com/8bitcodeWeb">
    <meta property="article:publisher" content="https://www.facebook.com/8bitcodeWeb">

    <!-- Social: Google+ / Schema.org  -->
    <meta itemprop="name" content="Title here...">
    <meta itemprop="description" content="Description here...">
    <meta itemprop="image" content="path/to/img">

    <!-- style -->
    <link rel="stylesheet" href="../../../assets/css/tailwind.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">

</head>
<body>
    <header>
        <!-- responsive navbar with hamburger -->
        <nav class="border-b-2 lg:border-b-0 border-black">
            <div class="logo">
                <img src="./assets/images/beesta-icon.svg" alt="Logo Image">
                <p data-text="Beesta">Beesta</p>
            </div>
            <div class="hamburger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-links">
                <!-- homepage -->
                <?php if ($_SERVER['REQUEST_URI'] == "/"): ?>
                    <li><a class="active" data-text="Accueil" href="/">Accueil</a></li>
                <?php else: ?>
                    <li><a data-text="Accueil" href="/">Accueil</a></li>
                <?php endif ?>

                <!-- work -->
                <?php if ($_SERVER['REQUEST_URI'] == "/projects"): ?>
                    <li><a class="active" data-text="Projets" href="/projects">Projets</a></li>
                <?php else: ?>
                    <li><a data-text="Projets" href="/projects">Projets</a></li>
                <?php endif ?>

                <!-- about -->
                <?php if ($_SERVER['REQUEST_URI'] == "/a-propos"): ?>
                    <li><a class="active" data-text="À propos" href="/a-propos">À propos</a></li>
                <?php else: ?>
                    <li><a data-text="À propos" href="/a-propos">À propos</a></li>                
                <?php endif ?>

                <!-- contact -->
                <?php if ($_SERVER['REQUEST_URI'] == "/contact"): ?>
                    <li><a class="active" data-text="Contact" href="/contact">Contact</a></li>
                <?php else: ?>
                    <li><a data-text="Contact" href="/contact">Contact</a></li>                
                <?php endif ?>
            </ul>
        </nav>
    </header>
    <main>
        <?= $content ?>
    </main>
    <script defer src="./assets/js/navbar.js"></script>
</body>
</html>