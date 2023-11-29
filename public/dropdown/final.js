const btndropSelect = document.querySelector(".btndrop__select");
const btndropItems = document.querySelectorAll(".btndrop__item");
const btndropSelected = document.querySelector(".btndrop__selected");
const btndropList = document.querySelector(".btndrop__list");
const btndrop = document.querySelector(".btndrop");
const btndropCaret = document.querySelector(".btndrop__caret");
// btndrop select
btndropSelect.addEventListener("click", function (event) {
  btndropList.classList.toggle("show");
  btndropCaret.classList.toggle("fa-caret-up");
});
// btndrop item
btndropItems.forEach((item) =>
  item.addEventListener("click", function (event) {
    const text = event.target.querySelector(".btndrop__text").textContent;
    btndropSelected.textContent = text;
    btndropList.classList.remove("show");
  })
);
// Click to document
document.addEventListener("click", function (e) {
  if (!btndrop.contains(e.target)) {
    btndropList.classList.remove("show");
  }
});
