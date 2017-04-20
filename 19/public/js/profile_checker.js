let xhr = new XMLHttpRequest();
let userInfo;
xhr.open('POST', 'ajax/user_data.php', false);
xhr.onload = function () {
    userInfo = JSON.parse(xhr.responseText);
};
xhr.send();

let fields = document.querySelectorAll('[type="text"], [type="number"], [type="date"]');
console.log(fields);

for (let i = 0; i < fields.length; i++) {
    fields[i].addEventListener('change', function () {
        if (this.value.trim() === '') {
            this.value = userInfo[this.name];
            this.classList.add('highlight');
        } else {
            this.classList.remove('highlight');
        }
    });
    console.log(fields[i]);
}

console.log(fields[0].name);

console.log(userInfo);