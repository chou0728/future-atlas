function rando(range) {
    return Math.floor(Math.random() * range).toString();
}

function starProps(diameter, canvasHeight) {
    var d = rando(diameter);
    return {
        height: d,
        width: d,
        top: rando(canvasHeight) + 'px',
        left: rando(canvasHeight) + 'px',
        'background-color': 'hsla(' + rando(360) + ',50%,75%, 1)'
    };
}

for (var i = 0; i < 5000; i++) {
    $('.galaxy').append(
        $('<div class="star"></div>').css(starProps(3, 800))
    );
}

for (var i = 0; i < 700; i++) {
    var diameter = rando(5);

    $('body').append(
        $('<div class="star"></div>').css({
            height: diameter,
            width: diameter,
            top: rando(100) + 'vh',
            left: rando(100) + 'vw',
            'background-color': 'hsla(' + rando(360) + ',50%,75%, 1)',
            opacity: '0.8'
        })
    );
}