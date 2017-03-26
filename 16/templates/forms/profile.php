<form action="">
    <h2>Регистрация</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, recusandae?</p>
    <input type="text" placeholder="Имя" pattern="[A-Za-zА-Яа-яЁё]{2,10}" required autocomplete="off">
    <input type="text" placeholder="Фамилия" pattern="[A-Za-zА-Яа-яЁё]{2,14}" required autocomplete="off">
    <input id="male" type="radio" name="gender" value="male" required autocomplete="off">
    <label for="male">Мужской</label>
    <input id="female" type="radio" name="gender" value="female" required autocomplete="off">
    <label for="female">Женский</label>
    <input type="number" placeholder="Возраст" min="1" max="100" pattern="\w+" required autocomplete="off">
    <input type="date" placeholder="Дата рождения" min="1899-01-01" max="2010-12-31" required autocomplete="off">
    <input type="text" placeholder="Телефон" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$"
           required autocomplete="off">
    <input type="text" placeholder="Логин" pattern="\w{3,10}" required autocomplete="off">
    <input type="text" placeholder="Пароль из смс" pattern="\w{5}" required autocomplete="off">
    <input type="password" placeholder="Пароль регистрации"
           pattern="(^(?!.*[А-Яа-яЁё])(?=(?:.*[A-Z]){1})(?=(?:.*[^A-Za-z0-9]){2}).{5,13})" required
           autocomplete="off">
    <input type="checkbox" id="news" name="subscribe" value="news">
    <label for="news">Новости</label>
    <input type="checkbox" id="shares" name="subscribe" value="shares">
    <label for="shares">Акции</label>
    <input type="checkbox" id="groups" name="subscribe" value="groups">
    <label for="groups">Группы</label>
    <input type="submit" value="Submit">
</form>