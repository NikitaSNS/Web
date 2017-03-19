//menuLis[4].after(menuLis[0]);

//move();

move();
setInterval(move, 5 * 1000);

function move() {

    let menuLis = $('.social-holder > li');

    let indexFrom = getRandomInt(0, menuLis.length);
    let indexTo = getRandomInt(0, menuLis.length);

    let to = $(menuLis[indexTo]);
    let from = $(menuLis[indexFrom]);

    let destination = to.position().left - from.position().left;

    upBlock(from, destination);

    let blocksToShift = [];

    if (destination > 0) {
        $(menuLis).each(function (i, e) {
            if (i > indexFrom && i <= indexTo) {
                blocksToShift.push(e);
            }
        });
    } else {
        $(menuLis).each(function (i, e) {
            if (i >= indexTo && i < indexFrom) {
                blocksToShift.push(e);
            }
        });
    }

    shiftBlocks(blocksToShift, -destination / blocksToShift.length);

    from.animate(
        {
            top: '0',
        },
        1000,
        function () {
            if (destination < 0) {
                indexTo--;
            }

            if (indexTo === -1) {
                $(menuLis[indexFrom]).insertBefore(menuLis[0]);
            } else {
                menuLis[indexTo].after(menuLis[indexFrom]);
            }
            $(menuLis).each(function (i, e) {
                $(e).removeAttr('style');
            });
        }
    )

}

function shiftBlocks(blocks, destination) {
    $(blocks).each(function (i, e) {
        $(e).animate(
            {
                left: destination
            },
            2000,
            function () {

            }
        );
    });
}

function upBlock($block, destination) {
    $block.animate(
        {
            top: '-30px',
            left: destination
        },
        2000,
        function () {

        }
    )
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}