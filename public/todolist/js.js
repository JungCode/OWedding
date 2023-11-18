const progress = document.querySelector(".completed-content_mid-progress");
const sub = document.querySelector(".completed-content_sub span");
progress.style.width =`${sub.innerHTML}%`;
// accordion
const accordionHearders = document.querySelectorAll(".accordion-header");
[...accordionHearders].forEach(item =>
    item.addEventListener("click", handleClickAccordition)
);
const activeStr = "is-active"
function handleClickAccordition(e) {
    const content = e.target.nextElementSibling;
    content.style.height =`${content.scrollHeight}px`;
    content.classList.toggle(activeStr);
    if(!content.classList.contains("is-active")){
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


//////////modal

function addModalEvent(btnevent, modalclass) {
  $(btnevent).click(function () {
    $(modalclass).animate({"top": ($(document).innerHeight() / 2) - $(modalclass).height() + 30}, 300);
    setTimeout(function () {
      $(modalclass).animate({"top": ($(document).innerHeight() / 2) - $(modalclass).height()}, 300);
    }, 300);
    $(".modal-bg").fadeIn("fast");
  });

  $('.close, .modal-bg').click(function () {
    $(modalclass).animate({"top": ($(document).innerHeight() / 2) - $(modalclass).height() + 30}, 300);
    setTimeout(function () {
      $(modalclass).animate({"top": -$(document).innerHeight()}, 300);
    }, 300);
    $(".modal-bg").fadeOut("fast");
  });
}

addModalEvent('.btnaddfirst','.modaladdfirst');

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
