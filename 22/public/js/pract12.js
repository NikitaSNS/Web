$img = $('.left-logo > img');

$items = $('.top > fieldset, figure, figure > figcaption, nav ul, main > *');

console.log($img.on('click', function () {
    $items.each(function (i, e) {
        setTimeout(function () {
            $(e).effect("shake");
        }, i * 150);
    });
}));