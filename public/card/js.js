
var x;
var $cards = $(".card");
var $style = $(".hover");
$cards
  .on("mousemove touchmove", function (e) {
    // normalise touch/mouse
    var pos = [e.offsetX, e.offsetY];
    e.preventDefault();
    if (e.type === "touchmove") {
      pos = [e.touches[0].clientX, e.touches[0].clientY];
    }
    var $card = $(this);
    // math for mouse position
    var l = pos[0];
    var t = pos[1];
    var h = $card.height();
    var w = $card.width();
    var px = Math.abs(Math.floor(100 / w * l) - 100);
    var py = Math.abs(Math.floor(100 / h * t) - 100);
    var pa = (50 - px) + (50 - py);
    // math for gradient / background positions
    var lp = (50 + (px - 50) / 1.5);
    var tp = (50 + (py - 50) / 1.5);
    var px_spark = (50 + (px - 50) / 7);
    var py_spark = (50 + (py - 50) / 7);
    var p_opc = 20 + (Math.abs(pa) * 1.5);
    var ty = ((tp - 50) / 2) * -1;
    var tx = ((lp - 50) / 1.5) * .5;
    // css to apply for active card
    var grad_pos = `background-position: ${lp}% ${tp}%;`
    var sprk_pos = `background-position: ${px_spark}% ${py_spark}%;`
    var opc = `opacity: ${p_opc / 100};`
    var tf = `transform: rotateX(${ty}deg) rotateY(${tx}deg)`
    // need to use a <style> tag for psuedo elements
    var style = `
      .card:hover:before { ${grad_pos} }  /* gradient */
      .card:hover:after { ${sprk_pos} ${opc} }   /* sparkles */ 
    `
    // set / apply css class and style
    $cards.removeClass("active");
    $card.removeClass("animated");
    $card.attr("style", tf);
    $style.html(style);
    if (e.type === "touchmove") {
      return false;
    }
    clearTimeout(x);
  }).on("mouseout touchend touchcancel", function () {
    // remove css, apply custom animation on end
    var $card = $(this);
    $style.html("");
    $card.removeAttr("style");
    x = setTimeout(function () {
      $card.addClass("animated");
    }, 1000);
  });
/////////////////////////////// date 
const wedtarget = document.querySelector('.dayphp');
const wedday = wedtarget.innerText;
console.log(wedday);
var result = wedday.split('-');
var finaldate = new Date("2023/11/25 00:00:00 GMT+0700"); 
finaldate.setDate(result[2]);
finaldate.setMonth(result[1]-1);
finaldate.setFullYear(result[0]);
console.log(finaldate);
console.log(finaldate.getDay());


////////////////modal
const modal = document.querySelector('.modal');
const childElement = modal.querySelector(':first-child');
const showModal = document.querySelectorAll('.show-modal');

const btnSubmit = document.querySelector('#btn-submit');
showModal.forEach(function (element) {
    element.addEventListener('click', function () {
        modal.classList.remove('hidden');
        modal.classList.remove('modal-close');
        modal.classList.add('modal-open');
        childElement.classList.remove('slide-up');
        childElement.classList.add('slide-down');
    });
});
const closeModal = document.querySelector('.close');
modal.addEventListener('click', closeGAM);
closebtn.addEventListener('click', closeGAM);
closeModal.addEventListener('click', closeGAM);
function closeGAM(e) {
    if (!childElement.contains(e.target) || closeModal.contains(e.target)) {
        modal.classList.remove('modal-open');
        modal.classList.add('modal-close');
        childElement.classList.add('slide-up');
        childElement.classList.remove('slide-down');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 250);
    }
}