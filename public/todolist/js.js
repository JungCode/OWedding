const progress = document.querySelector(".completed-content_mid-progress");
const sub = document.querySelector(".completed-content_sub span");
progress.style.width = `${sub.innerHTML}%`;
// accordion
const accordionHearders = document.querySelectorAll(".accordion-header");
[...accordionHearders].forEach(item =>
    item.addEventListener("click", handleClickAccordition)
);
const activeStr = "is-active"

function handleClickAccordition(e) {
    const content = e.target.nextElementSibling;
    content.style.height = `${content.scrollHeight}px`;
    content.classList.toggle(activeStr);
    if (!content.classList.contains("is-active")) {
        content.style.height = "0px";
    }
    const icon = e.target.querySelector(".icon");
    icon.classList.toggle("fa-angle-down");
    icon.classList.toggle("fa-angle-up");
}

///////////////check box
const checkboxes = document.querySelectorAll('.checkbox');

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function () {
        const span = this.parentElement.nextElementSibling.querySelector('.inneritem-text_main');
        span.style.textDecoration = this.checked ? 'line-through' : 'none';
    });
});

const listlable = document.querySelectorAll('.labelcheckbox');
listlable.forEach((lable) => {
  lable.addEventListener('click',function () {
      const checkbox = lable.parentElement.querySelector('.checkbox');
      console.log(checkbox);

      checkbox.checked = !checkbox.checked;
  });
});

//////////modal

var currentModal = null;

function addModalEvent(btnevent, modalclass, closebtn) {
    $(btnevent).click(function () {
        openModal(modalclass);
    });

    $(closebtn + ', .modal-bg').click(function () {
        closeModal(modalclass);
    });
}

function openModal(modalclass) {
    if (currentModal !== null) {
        closeModal(currentModal);
    }

    currentModal = modalclass;

    $(modalclass).animate({
        "top": ($(document).innerHeight() / 2) - $(modalclass).height() + 30
    }, 300);

    setTimeout(function () {
        $(modalclass).animate({
            "top": ($(document).innerHeight() / 2) - $(modalclass).height()
        }, 300);
    }, 300);

    $(".modal-bg").fadeIn("fast");
}

function closeModal(modalclass) {
    if (currentModal === modalclass) {
        $(modalclass).animate({
            "top": ($(document).innerHeight() / 2) - $(modalclass).height() + 30
        }, 300);

        setTimeout(function () {
            $(modalclass).animate({
                "top": -$(document).innerHeight()
            }, 300);
        }, 300);

        $(".modal-bg").fadeOut("fast");

        currentModal = null;
    }
}

addModalEvent('.btnaddfirst', '.modaladdfirst', '.modaladdfirst-header_close');
addModalEvent('.innerbtn-btn', '.modaladdsecond', '.modaladdsecond-header_close');

// $('.btnaddfirst').click( function() {
//     $('.modal').animate({"top" : ($(document).innerHeight()/2) - $('.modal').height() + 30}, 300);
//   setTimeout(function(){
//     $('.modal').animate({"top" : ($(document).innerHeight()/2) - $('.modal').height()}, 300);
//   },300);
//     $(".modal-bg").fadeIn("fast");
//   });

//   $('.close, .modal-bg').click( function() {
//     $('.modal').animate({"top" : ($(document).innerHeight()/2) - $('.modal').height() + 30}, 300);
//   setTimeout(function(){
//     $('.modal').animate({"top" : -$(document).innerHeight()}, 300);
//   },300);
//     $(".modal-bg").fadeOut("fast");
//   });
