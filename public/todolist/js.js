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