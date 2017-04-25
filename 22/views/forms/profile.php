<form method="post" enctype="multipart/form-data">
    <h2>Профиль</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, recusandae?</p>
    <?php if (!empty($form['img_path'])) : ?>
        <img src="public/upload/img/<?php echo $form['img_path']; ?>"
             alt="<?php echo str_replace($form['login'], '', $form['img_path']) ?>">
    <?php endif; ?>

    <input type="text" name="first_name" value="<?php echo $form['first_name']; ?>" placeholder="Имя">
    <input type="text" name="last_name" value="<?php echo $form['last_name']; ?>" placeholder="Фамилия">
    <input id="male" type="radio" name="gender" <?php echo $form['gender'] === 'male' ? 'checked' : '' ?> value="male"
           required autocomplete="off">
    <label for="male">Мужской</label>
    <input id="female" type="radio" name="gender" <?php echo $form['gender'] === 'female' ? 'checked' : '' ?>
           value="female" required autocomplete="off">
    <label for="female">Женский</label>
    <input type="number" name="age" value="<?php echo $form['age']; ?>" placeholder="Возраст">
    <input type="date" name="date_of_birth" value="<?php echo $form['date_of_birth']; ?>" placeholder="Дата рождения">
    <input type="text" name="phone" value="<?php echo $form['phone']; ?>" placeholder="Телефон">
    <input type="text" name="login" value="<?php echo $form['login']; ?>" placeholder="Логин">
    <input type="text" name="password_sms" value="<?php echo $form['password_sms']; ?>" placeholder="Пароль из смс">
    <input type="password" name="password" placeholder="Пароль регистрации">
    <input type="checkbox" id="news" name="subscribe[]" <?php echo $form['news'] ? 'checked' : '' ?> value="news">
    <label for="news">Новости</label>
    <input type="checkbox" id="shares" name="subscribe[]" <?php echo $form['shares'] ? 'checked' : '' ?> value="shares">
    <label for="shares">Акции</label>
    <input type="checkbox" id="groups" name="subscribe[]" <?php echo $form['groups'] ? 'checked' : '' ?> value="groups">
    <label for="groups">Группы</label>
    <input id="img" name="imgfile" type="file">
    <?php if (isset($error)): ?>
        <hr>
        <p class="error"><?php echo $error ?></p>
        <hr>
    <?php endif; ?>
    <input type="submit" name="submit" value="Принять">
</form>
<h3 style="text-align: center"><a href="logout.php">Выйти</a></h3>

<script src="public/js/profile_checker.js"></script>