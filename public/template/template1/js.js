
window.addEventListener('scroll', function () {
    var scrollPosition = window.scrollY;
    var navbar = document.querySelector(".header");
    var logored = document.querySelector(".logo-red");
    var logowhite = document.querySelector(".logo-white");
    var headbtn = document.querySelector(".header-btn");
    // Điều kiện kiểm tra vị trí cuộn và thay đổi màu nền
    if (scrollPosition > 0) {
        navbar.style.backgroundColor = 'white';
        navbar.style.position = 'fixed';
        navbar.style.boxShadow = '5px 5px 5px rgba(45, 45, 45, 0.147)';
        /////////////////
        navbar.classList.add("scroll");
        logored.classList.add("logoactive");
        logowhite.classList.remove("logoactive");
        //////////////
        // headbtn.classList.add("btnactive");

    } else {
        navbar.style.backgroundColor = 'transparent';
        navbar.style.boxShadow = 'none';
        navbar.classList.remove("scroll");
        logowhite.classList.add("logoactive");
        logored.classList.remove("logoactive");
        // headbtn.classList.remove("btnactive");
    }
});

/////////////////
//slider
let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 3000);

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};

// //////countdown
// The date want to count down to
var targetDate = new Date("2023/11/25 00:00:00 GMT+0700");   
const wedtarget = document.querySelector('.home-wrap-date span');
const wedday = wedtarget.innerText;
console.log(wedday);

var result = wedday.split('-');

targetDate.setDate(result[2]);
targetDate.setMonth(result[1]-1);
targetDate.setFullYear(result[0]);

console.log(targetDate);

// if (result.length === 3) {
//     var part1 = result[0];
//     var part2 = result[1];
//     var part3 = result[2];

//     console.log("Part 1:", part1);
//     console.log("Part 2:", part2);
//     console.log("Part 3:", part3);
// } else {
//     console.log("Chuỗi không thể chia thành 3 phần.");
// }


// Other date related variables
var days;
var hrs;
var min;
var sec;

$(function() {
   // Calculate time until launch date
   timeToLaunch();
  // Transition the current countdown from 0 
  numberTransition('#days .number', days, 1000, 'swing');
  numberTransition('#hours .number', hrs, 1000, 'swing');
  numberTransition('#minutes .number', min, 1000, 'swing');
  numberTransition('#seconds .number', sec, 1000, 'swing');
  // Begin Countdown
  setTimeout(countDownTimer,1001);
  
});


//   FIGURE OUT THE AMOUNT OF 
//    TIME LEFT BEFORE LAUNCH

function timeToLaunch(){
    // Get the current date
    var currentDate = new Date();

    // Find the difference between dates
    var diff = (currentDate - targetDate)/1000;
    var diff = Math.abs(Math.floor(diff));  

    // Check number of days until target
    days = Math.floor(diff/(24*60*60));
    sec = diff - days * 24*60*60;

    // Check number of hours until target
    hrs = Math.floor(sec/(60*60));
    sec = sec - hrs * 60*60;

    // Check number of minutes until target
    min = Math.floor(sec/(60));
    sec = sec - min * 60;
}

/* --------------------------
 * DISPLAY THE CURRENT 
   COUNT TO LAUNCH
 * -------------------------- */
function countDownTimer(){ 
    
    // Figure out the time to launch
    timeToLaunch();
    
    // Write to countdown component
    $( "#days .number" ).text(days);
    $( "#hours .number" ).text(hrs);
    $( "#minutes .number" ).text(min);
    $( "#seconds .number" ).text(sec);
    
    // Repeat the check every second
    setTimeout(countDownTimer,1000);
}

/* --------------------------
 * TRANSITION NUMBERS FROM 0
   TO CURRENT TIME UNTIL LAUNCH
 * -------------------------- */
function numberTransition(id, endPoint, transitionDuration, transitionEase){
  // Transition numbers from 0 to the final number

  $({numberCount: $(id).text()}).animate({numberCount: endPoint}, {
      duration: transitionDuration,
      easing:transitionEase,
      step: function() {
        $(id).text(Math.floor(this.numberCount));
      },
      complete: function() {
        $(id).text(this.numberCount);
      }     
    }); 
   
};