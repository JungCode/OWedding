function readURL(input) {
    if (input.files && input.files[0]) {
        var imagePreview = $(input).closest('.storyitem').find('#imagePreview');
        var reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.css('background-image', 'url(' + e.target.result + ')');
            // imagePreview.hide();
            imagePreview.fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('.imgbot-btn').change(function () {
    readURL(this);
    var closestCheck = $(this).closest('.storyitem').find('.img-check');
    closestCheck.attr("value", "1");
});
////////
const btnaddstory = document.querySelector(".editbtn-add");
const storycontent = document.querySelector('.editcontent');
let idnumber = 1;
let storyitem = `<div class="storyitem">
<div
    class="storyitem-img"
    id="imagePreview"
    style="
        background-image: url(/public/image/bocchi2.jpg);
    "
>
    <div class="imgbot">
        <input type="file" id="inputstoryadd1" class="imgbot-btn"></input>
        <label for="inputstoryadd1">Thay đổi</label>                               
    </div>
</div>
<input type="hidden" value="" name="id[]">
<div class="input-focus-effect">
    <input type="text" placeholder=" " name="title[]" />
    <label>Tiêu đề</label>
</div>
<div class="input-focus-effect">
    <input type="text" placeholder=" " name="date[]" />
    <label>Thời gian</label>
</div>
<div class="input-focus-effect">
    <textarea type="text" placeholder=" " name="content" ></textarea>
    <label>Nội dung</label>
</div>
<div class="storyitem-btn">
    <button class="storyitem-btn_del"><i class="fa-regular fa-trash-can"></i></button>
</div>
</div>`

// function handeleventchangebgc() {

// }
btnaddstory.addEventListener("click", function (e) {
    idnumber++;
    let storyitemWithNewId = storyitem.replace(/id="inputstoryadd1"/g, `id="inputstoryadd${idnumber}"`).replace(/for="inputstoryadd1"/g, `for="inputstoryadd${idnumber}"`);
    console.log(idnumber);
    console.log(storyitemWithNewId);
    storycontent.insertAdjacentHTML("beforeend", storyitemWithNewId);
    $('.imgbot-btn').change(function () {
        readURL(this);
    });
});
////////////////////////////////
function handleDeleteEvent(button) {
    var storyItem = button.closest('.storyitem');
    if (storyItem) {
        storyItem.remove();
    }
}
document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.storyitem-btn_del');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            handleDeleteEvent(button);
        });
    });
    var addStoryItemButton = document.querySelector(".editbtn-add");
    addStoryItemButton.addEventListener('click', function () {
        var newDeleteButton = document.querySelector('.storyitem:last-child .storyitem-btn_del');
        newDeleteButton.addEventListener('click', function () {
            handleDeleteEvent(newDeleteButton);
        });
    });
});
