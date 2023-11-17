var j = jQuery.noConflict();
const percent1 = document.querySelector(".spend-spinner")
const percent2 = document.querySelector(".pay-spinner")
function setProgress1(num) {
    var $spinner = j('.spend-spinner .progress-circle .spinner');
    var $filler = j('.spend-spinner .progress-circle .filler');
    var $percentage = j('.spend-spinner .progress-circle .percentage');

    if (num < 0) num = 0;
    if (num > 100) num = 100;

    var initialNum = $percentage.text().replace('%', '');
    j({
        numVal: initialNum
    }).animate({
        numVal: num
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (currVal) {
            $percentage.text(Math.ceil(currVal) + '%');
            if (currVal > 0 && currVal <= 50) {
                $filler.css('display', 'none');
                var spinnerDegs = -180 + ((currVal * 180) / 50);
                rotate($spinner, spinnerDegs);
            } else if (currVal > 50) {
                rotate($spinner, 0);
                $filler.css('display', '');
                var fillerDegs = 0 + ((currVal * 180) / 50);
                rotate($filler, fillerDegs);
            }
        }
    });
}
function setProgress2(num) {
    var $spinner = j('.pay-spinner .progress-circle .spinner');
    var $filler = j('.pay-spinner .progress-circle .filler');
    var $percentage = j('.pay-spinner .progress-circle .percentage');

    if (num < 0) num = 0;
    if (num > 100) num = 100;

    var initialNum = $percentage.text().replace('%', '');
    j({
        numVal: initialNum
    }).animate({
        numVal: num
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (currVal) {
            $percentage.text(Math.ceil(currVal) + '%');
            if (currVal > 0 && currVal <= 50) {
                $filler.css('display', 'none');
                var spinnerDegs = -180 + ((currVal * 180) / 50);
                rotate($spinner, spinnerDegs);
            } else if (currVal > 50) {
                rotate($spinner, 0);
                $filler.css('display', '');
                var fillerDegs = 0 + ((currVal * 180) / 50);
                rotate($filler, fillerDegs);
            }
        }
    });
}

function rotate($el, deg) {
    $el.css({
        'transform': 'rotate(' + deg + 'deg)'
    });
}

setProgress1(percent1.getAttribute("value"));
setProgress2(percent2.getAttribute("value"));

