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
// document.addEventListener("click",function (e) {
//     console.log(e.target);
// })
///////////////check box
const checkboxes = document.querySelectorAll('.checkbox');
const inputIdItems = document.querySelector('#inputIdItems');
let arrayChecks = "";
checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function () {
        const span = this.parentElement.nextElementSibling.querySelector('.inneritem-text_main');
        if (span) {
            span.style.textDecoration = this.checked ? 'line-through' : 'none';
        }
        //array
        if (this.checked) {
            temp = arrayChecks.replace(checkbox.dataset.taskid + ".", "");
            if(temp === arrayChecks){
                arrayChecks += checkbox.dataset.taskid + ".";
            }else{
                arrayChecks = temp;
            }
        } else {
            temp = arrayChecks.replace(checkbox.dataset.taskid + ".", "");
            if(temp === arrayChecks){
                arrayChecks += checkbox.dataset.taskid + ".";
            }else{
                arrayChecks = temp;
            }
        }
        inputIdItems.setAttribute('value', arrayChecks);
    });

    const span = checkbox.parentElement.nextElementSibling.querySelector('.inneritem-text_main');
    if (checkbox.checked) {
        if (span) {
            span.style.textDecoration = 'line-through';
        }
    }
});

//  // Lấy tất cả các phần tử label có class "labelcheckbox"
//  const labels = document.querySelectorAll('.labelcheckbox');

//  // Lặp qua từng label và thêm sự kiện click
//  labels.forEach(label => {
//      label.addEventListener('click', function () {
//          // Lấy id của checkbox từ thuộc tính "for" của label
//          const checkboxId = this.getAttribute('for');
//          const checkbox = document.getElementById(checkboxId);

//          // Kiểm tra và thay đổi trạng thái của checkbox
//          if (checkbox) {
//              checkbox.checked = !checkbox.checked;
//          }
//      });
//  });

//////////modal

// var currentModal = null;

// function addModalEvent(btnevent, modalclass, closebtn) {
//     $(btnevent).click(function () {
//         openModal(modalclass);
//     });

//     $(closebtn + ', .modal-bg').click(function () {
//         closeModal(modalclass);
//     });
// }

// function openModal(modalclass) {
//     if (currentModal !== null) {
//         closeModal(currentModal);
//     }

//     currentModal = modalclass;
//     var modalHeight = $(modalclass).height();
//     var topPosition = Math.max(30, ($(document).innerHeight() / 2) - modalHeight);
//     $(modalclass).animate({
//         "top": topPosition + 30
//     }, 300);

//     setTimeout(function () {
//         $(modalclass).animate({
//             "top": topPosition
//         }, 300);
//     }, 300);

//     $(".modal-bg").fadeIn("fast");
// }

// function closeModal(modalclass) {
//     if (currentModal === modalclass) {
//         $(modalclass).animate({
//             "top": ($(document).innerHeight() / 2) - $(modalclass).height() + 30
//         }, 300);

//         setTimeout(function () {
//             $(modalclass).animate({
//                 "top": -$(document).innerHeight()
//             }, 300);
//         }, 300);

//         $(".modal-bg").fadeOut("fast");

//         currentModal = null;
//     }
// }

// addModalEvent('.btnaddfirst', '.modaladdfirst', '.modaladdfirst-header_close');
// addModalEvent('.innerbtn-btn', '.modaladdsecond', '.modaladdsecond-header_close');
// addModalEvent('.accordion-header-icon_edit','.modaleditfirst','.modaleditfirst-header_close');
// addModalEvent('.editlist','.modaleditsecond','.modaleditsecond-header_close');
// addModalEvent('.accordion-header-icon_delete','.modaldeletefirst','.modaldeletefirst-body_cancel');
// addModalEvent('.deletelist','.modaldeletesecond','.modaldeletesecond-body_cancel');


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
