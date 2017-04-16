// document.designMode = 'on';
// document.body.contentEditable = true;

let elements = document.getElementsByClassName('editable');

for (let i = 0; i < elements.length; i++) {
    elements[i].contentEditable = true;
    elements[i].designMode = 'on';
    elements[i].onblur = function () {
        send(this.classList[1], this.innerText);
    }
}


function send(name, data) {
    let xhr = new XMLHttpRequest();

    let body = name + '=' + encodeURIComponent(data);

    xhr.open("POST", 'save_text.php', true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=utf-8');

    xhr.onreadystatechange = function() {
        console.log( this.responseText );
    };

    xhr.send(body);
}