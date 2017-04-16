<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moscow Auto Glass</title>
    <link rel="stylesheet" type="text/css" href="public/css/page.css">
    <link rel="stylesheet" type="text/css" href="public/css/icons.css">
</head>

<body>
<header>
    <div class="top">
        <div class="left-logo">
            <img src="public/img/left_logo.png" alt="Moscow Auto Glass logo">
        </div>
        <ul class="social-holder">
            <li>
                <a href="#" class="icon blogger"></a>
            </li>
            <li>
                <a href="#" class="icon no_name"></a>
            </li>
            <li>
                <a href="#" class="icon facebook"></a>
            </li>
            <li>
                <a href="#" class="icon google"></a>
            </li>
            <li>
                <a href="#" class="icon li"></a>
            </li>
            <li>
                <a href="#" class="icon lj"></a>
            </li>
            <li>
                <a href="#" class="icon mail"></a>
            </li>
            <li>
                <a href="#" class="icon star"></a>
            </li>
            <li>
                <a href="#" class="icon space"></a>
            </li>
            <li>
                <a href="#" class="icon print"></a>
            </li>
            <li>
                <a href="#" class="icon twitter"></a>
            </li>
            <li>
                <a href="#" class="icon vk"></a>
            </li>
            <li>
                <a href="#" class="icon yahoo"></a>
            </li>
            <li>
                <a href="#" class="icon yandex"></a>
            </li>
        </ul>
        <fieldset class="right-contact">
            <legend class="editable contacts"><?php echo $site['contacts']; ?></legend>
            <p class="editable first_phone"><?php echo $site['first_phone']; ?></p>
            <p class="editable second_phone"><?php echo $site['second_phone']; ?></p>
            <p class="editable adress"><?php echo $site['adress']; ?></p>
        </fieldset>
    </div>
    <div>
        <figure>
            <img src="public/img/logo.png" alt="Moscow Auto Glass">
            <figcaption>
                <h2 class="editable about"><?php echo $site['about']; ?></h2>
                <p class="editable img_text"><?php echo $site['img_text']; ?></p>
            </figcaption>
        </figure>
    </div>
</header>
<nav>
    <ul>
        <li><a href="#" class="editable li_main"><?php echo $site['li_main']; ?></a></li>
        <li><a href="#" class="editable li_port"><?php echo $site['li_port']; ?></a></li>
        <li><a href="#" class="editable li_about"><?php echo $site['li_about']; ?></a></li>
        <li><a href="#" class="editable li_info"><?php echo $site['li_info']; ?></a></li>
        <li><a href="#" class="editable li_link"><?php echo $site['li_link']; ?></a></li>
    </ul>
</nav>
<main>
    <section>
        <h2 class="editable welcome"><?php echo $site['welcome']; ?></h2>
        <p class="editable lorem"><?php echo $site['lorem']; ?></p>
    </section>
    <aside>
        <fieldset class="news">
            <legend class="editable news"><?php echo $site['news']; ?></legend>
            <time datetime="2012-11-01" class="editable data"><?php echo $site['data']; ?></time>
            <p class="editable data_txt"><?php echo $site['data_txt']; ?></p>
        </fieldset>
    </aside>
</main>
<footer>
    <p class="editable footer"><?php echo $site['footer']; ?></p>
</footer>
<?php if ($_SESSION['admin'] == true) : ?>
    <script src="public/js/main.js"></script>
<?php endif; ?>
</body>

</html>