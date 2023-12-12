function readURL(input) {
    if (input.files && input.files[0]) {
        var imagePreview = $(input).closest('.husbandinfor').find('#imagePreview');
        var reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.css('background-image', 'url(' + e.target.result + ')');
            // imagePreview.hide();
            imagePreview.fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#husbandimginput').change(function () {
    readURL(this);
});

function readURLwife(input) {
    if (input.files && input.files[0]) {
        var imagePreview = $(input).closest('.wifeinfor').find('#imagePreview');
        var reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.css('background-image', 'url(' + e.target.result + ')');
            // imagePreview.hide();
            imagePreview.fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#wifeimginput').change(function () {
    readURLwife(this);
});
