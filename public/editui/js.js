function readURL(input) {
    if (input.files && input.files[0]) {
        var imagePreview = $(input).closest('.edituiitem').find('#imagePreview');
        var reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.css('background-image', 'url(' + e.target.result + ')');
            imagePreview.hide();
            imagePreview.fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('.imgUpload').change(function () {
    readURL(this);
});
