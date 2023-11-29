
// 
const profile = document.querySelector('.btn-header');
const dropdown = document.querySelector('.dropdown__wrapper');

profile.addEventListener('click', () => {
    dropdown.classList.remove('none');
    dropdown.classList.toggle('hide');
})


document.addEventListener("click", (event) => {
    const isClickInsideDropdown = dropdown.contains(event.target);
    const isProfileClicked = profile.contains(event.target);

    if (!isClickInsideDropdown && !isProfileClicked) {
        dropdown.classList.add('hide');
        dropdown.classList.add('dropdown__wrapper--fade-in');
    }
});
///
// const btndropSelect = document.querySelector(".btndrop__select");
// const btndropItems = document.querySelectorAll(".btndrop__item");
// const btndropSelected = document.querySelector(".btndrop__selected");
// const btndropList = document.querySelector(".btndrop__list");
// const btndrop = document.querySelector(".btndrop");
// const btndropCaret = document.querySelector(".btndrop__caret");
// // btndrop select
// btndropSelect.addEventListener("click", function (event) {
//   btndropList.classList.toggle("show");
//   btndropCaret.classList.toggle("fa-caret-up");
// });
// // btndrop item
// btndropItems.forEach((item) =>
//   item.addEventListener("click", function (event) {
//     const text = event.target.querySelector(".btndrop__text").textContent;
//     btndropSelected.textContent = text;
//     btndropList.classList.remove("show");
//   })
// );
// // Click to document
// document.addEventListener("click", function (e) {
//   if (!btndrop.contains(e.target)) {
//     btndropList.classList.remove("show");
//   }
// });
// 
const btnchoice = document.querySelector(".btn-choice");
const btnchoiceitem = document.querySelector(".btn-choicelist")
btnchoice.addEventListener("click",function (e) {
  btnchoiceitem.classList.toggle("choiceshown");

});
document.addEventListener("click", function (e) {
  if (!btnchoice.contains(e.target)) {
    btnchoiceitem.classList.remove("choiceshown");
  }
});