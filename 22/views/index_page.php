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
            <legend>Контакты:</legend>
            <p>+7 985 444 90 97</p>
            <p>+7 910 400 14 19</p>
            <p>Москва ул мельникова д 5</p>
        </fieldset>
        <?php if (!isset($_SESSION['auth'])) : ?>
            <div class="auth">
                <a href="login.php">Авторизация</a>
                <a href="registration.php">Регистрация</a>
            </div>
        <?php else: ?>
            <div class="auth">
                <a href="profile.php">Профиль</a>
                <a href="logout.php">Выйти</a>
            </div>
        <? endif; ?>
    </div>
    <div>
        <figure>
            <img id="top_img" src="public/img/logo.png" alt="Moscow Auto Glass">
            <figcaption>
                <h2 id="caption">О компании</h2>
                <p id="description">My Drive is the home for all your files. With Google Drive for My Drive is the home
                    for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive
                    for </p>
            </figcaption>
        </figure>
    </div>
</header>
<nav>
    <ul>
        <li><a href="#">Главная</a></li>
        <li><a href="#">Портфолио</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Информация</a></li>
        <li><a href="#">Ссылка</a></li>
    </ul>
</nav>
<main>
    <section>
        <h2>Добро пожаловать!</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi natus voluptate illo magnam laudantium,
            odio quasi non nesciunt in vitae aliquam aspernatur totam quo aut hic dignissimos magni eaque praesentium,
            doloremque maxime at. Praesentium tenetur,
            repellat corporis dolor atque fuga esse voluptates labore quod quis!
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi natus voluptate illo magnam laudantium,
            odio quasi non nesciunt in vitae aliquam aspernatur totam quo aut hic dignissimos magni eaque praesentium,
            doloremque maxime at. Praesentium tenetur,
            repellat corporis dolor atque fuga esse voluptates labore quod quis!
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi natus voluptate illo magnam laudantium,
            odio quasi non nesciunt in vitae aliquam aspernatur totam quo aut hic dignissimos magni eaque praesentium,
            doloremque maxime at. Praesentium tenetur,
            repellat corporis dolor atque fuga esse voluptates labore quod quis!
        </p>
    </section>
    <aside>
        <fieldset class="news">
            <legend>Новости:</legend>
            <time datetime="2012-11-01">01/11/2012</time>
            <p>Здесь выводится информация при взаимодействии с кнопками «о н #1</p>
            <time datetime="2012-11-01">01/11/2012</time>
            <p>Здесь выводится информация при взаимодействии с кнопками «о н #1</p>
        </fieldset>
    </aside>
</main>
<footer>
    <p>ООО "Название сайта" 2012</p>
</footer>
<script src="public/js/jquery-3.2.0.min.js"></script>
<script src="public/js/jquery-ui.js"></script>
<script src="public/js/pract7.js"></script>
<script src="public/js/pract8.js"></script>
<script src="public/js/pract9.js"></script>
<script src="public/js/pract10.js"></script>
<script src="public/js/pract11.js"></script>
<script src="public/js/pract12.js"></script>